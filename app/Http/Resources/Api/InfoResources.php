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
        return [
            "id"=> $this->id,
            'name' => $this->name,
            'logo' => $this->logo,
            'phone' => $this->phone,
            'phone_1' => $this->phone_1,
            'phone_2' => $this->phone_2,
            'phone_3' => $this->phone_3,
            'phone_4' => $this->phone_4,
            'fb_link' => $this->fb_link,
            'tw_link' => $this->tw_link,
            'in_link' => $this->in_link,
            'payment_logo' => $this->payment_logo,
            'home_open_logo_new' => $this->home_open_logo_new,
            'home_tilte_logo_new' => $this->home_tilte_logo_new,
            'home_title_products_1' => $this->home_title_products_1,
            'notes_title_products_1' => $this->notes_title_products_1,
            'home_title_products_2' => $this->home_title_products_2,
            'notes_title_products_2' => $this->notes_title_products_2,
            'partners_logo' => $this->partners_logo,
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
