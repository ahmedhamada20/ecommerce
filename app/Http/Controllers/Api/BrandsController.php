<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\BrandResources;
use App\Http\Resources\Api\CategoryResources;
use App\Models\Brand;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $data = Brand::whereActive(true)->get();
        return $this->successResponse(BrandResources::collection($data), 'Return Data Successfully');

    }
}
