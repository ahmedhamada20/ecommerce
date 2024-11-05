<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ColorResources;
use App\Http\Resources\Api\SizesResources;
use App\Http\Resources\Api\TagsResources;
use App\Http\Resources\Api\InfoResources;
use App\Http\Resources\Api\GalleryResources;
use App\Http\Resources\Api\PartnerResources;
use App\Models\Color;
use App\Models\Gallery;
use App\Models\Info;
use App\Models\Partner;
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


    public function info()
    {
        $data = Info::first();
        return $this->successResponse(new InfoResources($data), 'date reutrn success');
   
    }


    public function galleries() {
        $data = Gallery::get();
        return $this->successResponse( data: GalleryResources::collection($data), message:'date reutrn success');
   
    }




    public function partners() {
        $data = Partner::get();
        return $this->successResponse( data: PartnerResources::collection($data), message:'date reutrn success');

    }
}
