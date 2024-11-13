<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\OrderResources;
use App\Models\Order;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    use ApiResponseTrait;
    public function get_orders()
    {
        $data = Order::where('customer_id',auth('api')->id())->paginate(20);
        $response = [
            'data' => OrderResources::collection($data),
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

    public function store()
    {

    }


    public function details()
    {

    }


    public function status_order()
    {

    }



}
