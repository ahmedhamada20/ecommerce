<?php

namespace App\Http\Resources\Api;

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
            'rate' => $this->rate,
            'news' => $this->news,
            'type_discount' => $this->type_discount,
            'discount_price' => $this->discount_price,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'short_description'=> $lang == "ar" ? $this->short_description_ar : $this->short_description_en,
            'description'=>  $lang == "ar" ? $this->description_ar : $this->description_en,
            'notes'=>  $lang == "ar" ? $this->notes_ar : $this->notes_en,
            'video' => isset($this->columns) ? json_decode($this->columns)->video : '' ,
            'additional' =>$lang == "ar" ? $this->additional_ar : $this->additional_en,
            'stock' => $this->stock,
            'publish' => $this->publish(),
            'brand_id' => new BrandResources($this->brand) ?? null,
            'features' => $this->features(),
            'category' => CategoryResources::collection($this->categories) ?? null,
            'tags' => TagsResources::collection($this->tags) ?? null,
            'colors' => ColorResources::collection($this->colors) ?? null,
            "comment" => CommentResource::collection($this->commentable)->where('status',1),
            "rateable" => RateResource::collection($this->rateable),
            'productColorImages' => $this->productColorImage
                ->where('product_id', $this->id)
                ->groupBy('color_id')
                ->map(function($images) {
                    return [
                        'color' => new ColorResources($images->first()->color),
                        'images' => $images->map(function ($image) {
                            return [
                                'image_path' => asset('storage/' . $image->image_path),
                            ];
                        })
                    ];
                })->toArray(),
            'sizes' => SizesResources::collection($this->sizes) ?? null,
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
