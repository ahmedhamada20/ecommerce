<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InfoResources extends JsonResource
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
            'name' => $lang == "ar" ? $this->name_ar : $this->name_en,
            'logo' =>asset('storage/info/'.$this->logo),
            'phone' => $this->phone,
            'phone_1' => $this->phone_1,
            'phone_2' => $this->phone_2,
            'phone_3' => $this->phone_3,
            'phone_4' => $this->phone_4,
            'fb_link' => $this->fb_link,
            'tw_link' => $this->tw_link,
            'in_link' => $this->in_link,
            'payment_logo' => asset('storage/info/'.$this->payment_logo),
            'home_open_logo_new' =>  asset('storage/info/'.$this->home_open_logo_new),
            'home_tilte_logo_new' => $this->home_tilte_logo_new,
           
           
           
            'home_title_products_1' => $lang == "ar" ? $this->home_title_products_1_ar : $this->home_title_products_1_en,
            'notes_title_products_1' => $lang == "ar" ? $this->notes_title_products_1_ar : $this->notes_title_products_1_en,
            'home_title_products_2' => $lang == "ar" ? $this->home_title_products_2_ar : $this->home_title_products_2_en,
            'notes_title_products_2' => $lang == "ar" ? $this->notes_title_products_2_ar : $this->notes_title_products_2_en,



            'partners_logo' => asset('storage/info/'.$this->partners_logo),
            'category_logo' => asset('storage/info/'.$this->category_logo),
            'banar_logo' => asset('storage/info/'.$this->banar_logo),
            'blog_logo' => asset('storage/info/'.$this->blog_logo),
            
            "category_logo_title" => $lang == "ar" ? $this->category_logo_title_ar : $this->category_logo_title_en,
            'create_dates' => [
                'created_at_human' => $this->created_at->diffForHumans(),
                'created_at' => $this->created_at->format('y-m-d h:i:s')
            ],
            'update_dates' => [
                'updated_at_human' => $this->updated_at->diffForHumans(),
                'updated_at' => $this->updated_at->format('y-m-d h:i:s')
            ]
        ];
    }
}
