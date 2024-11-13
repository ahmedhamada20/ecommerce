<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailsResources extends JsonResource
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
            'product' => new ProductResources($this->product) ?? null,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'color' => $this->color,
            'size' => $this->size,
        ];
    }
}
