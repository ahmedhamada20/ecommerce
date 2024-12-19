<?php

namespace App\Http\Resources;

use App\Http\Resources\Api\UserResources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RateCommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'customer_id' => new UserResources($this->customer),
            'photo' => $this->photo,
            'value' => $this->value,
            'comments' => $this->comments,
            'commentable_id' => $this->commentable_id,
            'commentable_type' => $this->commentable_type,
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
