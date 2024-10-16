<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryProductsResources;
use App\Http\Resources\Api\CategoryResources;
use App\Models\Category;
use App\Traits\ApiResponseTrait;

class CategoryController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $data = Category::whereActive(true)->get();
        return $this->successResponse(CategoryResources::collection($data), 'Return Data Successfully');

    }

    public function show($id)
    {
        $data = Category::findorfail($id);
        return $this->successResponse(new CategoryResources($data), 'Return Data Successfully');

    }

    public function product()
    {

        $data = Category::findorfail(request()->id);
        if (!$data){
            return $this->errorResponse( 'data Error not found !!',404);

        }
        return $this->successResponse(new CategoryProductsResources($data), 'Return Data Successfully');

    }
}
