<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
}
