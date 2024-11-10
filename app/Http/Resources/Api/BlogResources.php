<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResources extends JsonResource
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
            'name' => $lang == "ar" ? $this->name_ar : $this->name_en,
            'short_description' => $lang == "ar" ? $this->short_description_ar : $this->short_description_en,
            'description' => $lang == "ar" ? $this->description_ar : $this->description_en,
            'image' => asset('storage/blogs/'.$this->image),
            'user_id' => $this->user_id ?? 'admin',
            'photos' => PhotoResources::collection($this->photos) ?? null,
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
