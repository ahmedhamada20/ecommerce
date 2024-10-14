<?php

namespace App\Http\Resources\Api;

use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResources extends JsonResource
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
            'slug' => $this->slug,
            'SKU' => $this->SKU,
            'discount_price' => $this->discount_price,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'notes' => $this->notes,
            'stock' => $this->stock(),
            'publish' => $this->publish(),
            'brand_id' => new BrandResources($this->brand),
            'features' => $this->features(),
            'category'=> CategoryResources::collection($this->categories),
            'tags'=> TagsResources::collection($this->tags),
            'colors'=> ColorResources::collection($this->colors),
            'sizes'=> SizesResources::collection($this->sizes),
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
