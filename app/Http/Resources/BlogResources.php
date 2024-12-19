<?php

namespace App\Http\Resources;

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
        $lan = $request->header('lan');
        return [
            'id' => $this->id,
            'name' => $lan == "ar" ? $this->name_ar : $this->name_en,
            'slug' => $this->slug,
            'rate' => $this->rate,
            'short_description' => $lan == "ar" ? $this->short_description_ar : $this->short_description_en,
            'description' => $lan == "ar" ? $this->description_ar : $this->description_en,
            'notes' => $lan == "ar" ? $this->notes_ar : $this->notes_en,
            'count_view' => $this->count_view,
            'count_comments' => $this->count_comments,
            'comment_rates' => RateCommentResource::collection($this->commentable),
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
