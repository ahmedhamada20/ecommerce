<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProductResources;
use App\Models\Product;
use App\Traits\ApiResponseTrait;
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

}
