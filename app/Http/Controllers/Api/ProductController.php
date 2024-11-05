<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProductResources;
use App\Models\Product;
use App\Traits\ApiResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    use ApiResponseTrait;
    public function index()
    {
        $data = Product::wherePublish(1)->paginate(10);
        $response = [
            'data' => ProductResources::collection($data),
            'pagination' => [
                'total' => $data->total(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'first_page_url' => $data->url(1),
                'last_page_url' => $data->url($data->lastPage()),
                'next_page_url' => $data->nextPageUrl(),
                'path' => $data->path(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem()
            ]
        ];
        return $this->successResponse($response, 'Return Data Successfully');

    }


    public function show()
    {
        $data = Product::findorfail(\request()->id);
        if (!$data){
            return $this->errorResponse( 'data Error not found !!',404);

        }
        return $this->successResponse(new ProductResources($data), 'Return Data Successfully');
    }

    public function product_week()
    {
        $topProducts = \DB::table('order_details')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'completed')
            ->where('orders.created_at', '>=', Carbon::now()->startOfWeek())
            ->groupBy('order_details.product_id')
            ->select('order_details.product_id', \DB::raw('COUNT(order_details.product_id) as sales_count'))
            ->orderByDesc('sales_count')
            ->take(15)
            ->pluck('product_id');
        $data = Product::whereIn('id',$topProducts)->wherePublish(1)->get();
        return $this->successResponse(ProductResources::collection($data), 'Return Data Successfully');
    }

    public function product_month()
    {
        $topProducts = \DB::table('order_details')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'completed')
            ->where('orders.created_at', '>=', Carbon::now()->startOfMonth())
            ->groupBy('order_details.product_id')
            ->select('order_details.product_id', \DB::raw('COUNT(order_details.product_id) as sales_count'))
            ->orderByDesc('sales_count')
            ->take(10)
            ->pluck('product_id');

        $data = Product::whereIn('id', $topProducts)->wherePublish(1)->get();
        return $this->successResponse(ProductResources::collection($data), 'Return Data Successfully');


    }
    public function product_last_month()
    {
        $topProductLastTwoMonths = \DB::table('order_details')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'completed')
            ->where('orders.created_at', '>=', Carbon::now()->subMonths(2)->startOfMonth())
            ->groupBy('order_details.product_id')
            ->select('order_details.product_id', \DB::raw('COUNT(order_details.product_id) as sales_count'))
            ->orderByDesc('sales_count')
            ->first();

        if ($topProductLastTwoMonths) {
            $product = Product::find($topProductLastTwoMonths->product_id);
            return $this->successResponse(new ProductResources($product), 'Date return success');
        } else {
            return $this->errorResponse('no product', 404);
        }


    }

}
