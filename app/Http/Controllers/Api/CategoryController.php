<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResources;
use App\Models\Category;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $data = Category::where('active',1)->paginate(10);
        return $this->successResponse([
            'data' => CategoryResources::collection($data),
            'pagination' => [
                'total' => $data->total(),
                'count' => $data->count(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'total_pages' => $data->lastPage(),
            ],
        ], 'Data return successfully');
    }

    public function show($slug)
    {
        $data = Category::where('active',1)->where('slug', $slug)->first();
        if (!$data) {
            return $this->errorResponse('Category not found !!');
        }
        return $this->successResponse(new CategoryResources($data), 'data return successfully');
    }


}
