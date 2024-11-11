<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\BlogResources;
use App\Http\Resources\Api\SilderResources;
use App\Models\Blog;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $data = Blog::where('publish','1')->get();
        return $this->successResponse(BlogResources::collection($data), 'Return Data Successfully');

    }


    public function show($id)
    {

        $data = Blog::find($id);
        return $this->successResponse(new BlogResources($data), 'Return Data Successfully');

    }
}
