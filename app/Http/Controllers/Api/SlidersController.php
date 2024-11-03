<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\SilderResources;
use App\Models\Slider;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $data = Slider::get();
        return $this->successResponse(SilderResources::collection($data), 'Return Data Successfully');

    }


    public function show($id)
    {
        $data = Slider::find($id);
        return $this->successResponse(SilderResources::collection($data), 'Return Data Successfully');

    }

}
