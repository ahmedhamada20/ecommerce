<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqQuestionsResources extends JsonResource
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
            'answer' => $lang == "ar" ? $this->answer_ar : $this->answer_en,
        ];
    }
}
