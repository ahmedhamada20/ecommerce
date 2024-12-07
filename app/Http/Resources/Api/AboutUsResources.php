<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutUsResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $lang = $request->header('language', 'en'); 
        return [
            "id"=> $this->id,
            'photo' => asset('storage/about_us/'.$this->photo),
            'photo_1' => asset('storage/about_us/'.$this->photo_1),
            'logo_1' => asset('storage/about_us/'.$this->logo_1),
            'logo_2' => asset('storage/about_us/'.$this->logo_2),
            'logo_3' => asset('storage/about_us/'.$this->logo_3),
            'description' => $lang == "ar" ? $this->description_ar : $this->description_en,
            'description_1' => $lang == "ar" ? $this->description_ar_1 : $this->description_en_1,
         
            'title_logo_1' => $lang == "ar" ? $this->title_logo_1_ar : $this->title_logo_1_en,
            'description_logo_1' => $lang == "ar" ? $this->description_logo_1_ar : $this->description_logo_1_en,
           
            'title_logo_2' => $lang == "ar" ? $this->title_logo_2_ar : $this->title_logo_2_en,
            'description_logo_2' => $lang == "ar" ? $this->description_logo_2_ar : $this->description_logo_2_en,
           
           
            'description_logo_3' => $lang == "ar" ? $this->description_logo_3_ar : $this->description_logo_3_en,
            'title_logo_3' => $lang == "ar" ? $this->title_logo_3_ar : $this->title_logo_3_en,
           
      
      
        ];
    }
}
