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
        return $this->successResponse(data: $response, message: 'Return Data Successfully');
    }


    public function show()
    {
        $data = Product::findorfail(\request()->id);
        if (!$data) {
            return $this->errorResponse('data Error not found !!', 404);
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
        $data = Product::whereIn('id', $topProducts)->wherePublish(1)->get();
        // return $this->successResponse(data: ProductResources::collection($data), 'Return Data Successfully');
        return $this->successResponse(data: ProductResources::collection($data), message: 'Return Data Successfully');
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
        return $this->successResponse(data: ProductResources::collection($data), message: 'Return Data Successfully');
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
            return $this->successResponse(data: new ProductResources($product), message: 'Return Data Successfully');
        } else {
            return $this->errorResponse('no product', 404);
        }
    }


    public function filter_product(Request $request)
    {

        $query = Product::with(relations: ['categories', 'tags', 'colors', 'sizes'])
            ->where('publish', 1);
        if ($request->has('categories') && is_array($request->categories)) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->whereIn('category_id', $request->categories);
            });
        }
        if ($request->has('tags') && is_array($request->tags)) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->whereIn('tag_id', $request->tags);
            });
        }
        if ($request->has('colors') && is_array($request->colors)) {
            $query->whereHas('colors', function ($q) use ($request) {
                $q->whereIn('color_id', $request->colors);
            });
        }
        if ($request->has('sizes') && is_array($request->sizes)) {
            $query->whereHas('sizes', function ($q) use ($request) {
                $q->whereIn('size_id', $request->sizes);
            });
        }
        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }
        if ($request->has('in_stock')) {
            $query->where('in_stock', $request->in_stock);
        }
        if ($request->has('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }
        $products = $query->paginate(10);
        $response = [
            'data' => ProductResources::collection($products),
            'pagination' => [
                'total' => $products->total(),
                'per_page' => $products->perPage(),
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'first_page_url' => $products->url(1),
                'last_page_url' => $products->url($products->lastPage()),
                'next_page_url' => $products->nextPageUrl(),
                'path' => $products->path(),
                'from' => $products->firstItem(),
                'to' => $products->lastItem()
            ]
        ];
        return $this->successResponse(data: $response, message: 'Return Data Successfully');
    }


    public function sort_product(Request $request)
    {
        $query = Product::with(relations: ['categories', 'tags', 'colors', 'sizes']);

        if ($request->has('sort_by')) {
            switch ($request->sort_by) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'latest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'featured':
                    $query->orderBy('features', 'desc');
                    break;
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
            }
        }

        $products = $query->paginate(10);
        $response = [
            'data' => ProductResources::collection($products),
            'pagination' => [
                'total' => $products->total(),
                'per_page' => $products->perPage(),
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'first_page_url' => $products->url(1),
                'last_page_url' => $products->url($products->lastPage()),
                'next_page_url' => $products->nextPageUrl(),
                'path' => $products->path(),
                'from' => $products->firstItem(),
                'to' => $products->lastItem()
            ]
        ];
        return $this->successResponse(data: $response, message: 'Return Data Successfully');
    }


    public  function related()
    {
        $id = request()->id;
        $product = Product::findOrFail($id);
        $categoryIds = $product->categories->pluck('id');
        $relatedProducts = Product::whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('id', $categoryIds);
        })
            ->where('id', '!=', $id)
            ->inRandomOrder()
            ->limit(15)
            ->get();

        return $this->successResponse(data: ProductResources::collection($relatedProducts), message: 'Return Data Successfully');
    }
}
