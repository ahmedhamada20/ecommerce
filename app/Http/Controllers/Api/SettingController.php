<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ColorResources;
use App\Http\Resources\Api\SizesResources;
use App\Http\Resources\Api\TagsResources;
use App\Models\Color;
use App\Models\Size;
use App\Models\Tag;
use App\Traits\ApiResponseTrait;

class SettingController extends Controller
{
    use ApiResponseTrait;
    public function colors()
    {
        $data = Color::whereActive(true)->get();
        return $this->successResponse(ColorResources::collection($data), 'Return Data Successfully');

    }

    public function sizes()
    {
        $data = Size::whereActive(true)->get();
        return $this->successResponse(SizesResources::collection($data), 'Return Data Successfully');

    }

    public function tags()
    {
        $data = Tag::get();
        return $this->successResponse(TagsResources::collection($data), 'Return Data Successfully');

    }
}
