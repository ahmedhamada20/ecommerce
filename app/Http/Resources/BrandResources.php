<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $lan = $request->header('lan');
        return [
            'id'=> $this->id,
            'name_ar'=>$lan == "ar" ? $this->name_ar : $this->name_en,
            'slug'=>$this->slug,
            'description_ar'=>$lan == "ar" ? $this->description_ar : $this->description_en,
            'count_view'=>$this->count_view,
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
