<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResources;
use App\Models\Blog;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $data = Blog::paginate(10);
        return $this->successResponse([
            'data' => BlogResources::collection($data),
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
        $data = Blog::where('slug', $slug)->first();
        if (!$data) {
            return $this->errorResponse('Blog not found !!',404);
        }
        return $this->successResponse(new BlogResources($data), 'data return successfully');
    }
}
