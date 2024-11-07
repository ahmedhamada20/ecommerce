<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\AboutUsResources;
use App\Http\Resources\Api\ColorResources;
use App\Http\Resources\Api\SizesResources;
use App\Http\Resources\Api\TagsResources;
use App\Http\Resources\Api\InfoResources;
use App\Http\Resources\Api\GalleryResources;
use App\Http\Resources\Api\PartnerResources;
use App\Models\AboutUs;
use App\Models\Color;
use App\Models\ContactUs;
use App\Models\Gallery;
use App\Models\Info;
use App\Models\Partner;
use App\Models\Size;
use App\Models\Tag;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;


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
        if ($data) {
            return $this->successResponse(new InfoResources($data), 'date reutrn success');
        }
        return $this->errorResponse('no Data', 404);
    }


    public function galleries()
    {
        $data = Gallery::get();
        return $this->successResponse(data: GalleryResources::collection($data), message: 'date reutrn success');
    }




    public function partners()
    {
        $data = Partner::get();
        return $this->successResponse(data: PartnerResources::collection($data), message: 'date reutrn success');
    }



    public function about_us()
    {
        $data = AboutUs::first();
        if ($data) {
            return $this->successResponse(data: new AboutUsResources($data), 'date reutrn success');
        }
        return $this->errorResponse('no Data', 404);
    }


    public function contactUs(Request $request) {
        $request->validate([
            'type'=>'required|in:email,contactUs',
            'name'=>'required_if:type,contactUs',
            'email'=>'required',
            'phone'=>'required_if:type,contactUs',
            'messages'=>'required_if:type,contactUs',
    
        ]);

        ContactUs::create([
            'name'=>$request->name ?? null,
            'email'=>$request->email,
            'phone'=>$request->phone ?? null,
            'messages'=>$request->messages ?? null,
            'type'=>$request->messages ?? null,
        ]);
        return $this->successResponse('', 'Data Created Successfully');

    }
}
