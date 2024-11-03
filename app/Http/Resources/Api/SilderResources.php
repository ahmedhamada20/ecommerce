<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SilderResources extends JsonResource
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
            'id' => $this->id,
            'title' => $lang == "ar" ? $this->title_ar : $this->title_en,
            'description' => $lang == "ar" ? $this->description_ar : $this->description_en,
            'photo' => asset('storage/sliders/'.$this->photo),
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
