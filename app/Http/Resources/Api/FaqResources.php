<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqResources extends JsonResource
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
            'id'=> $this->id,
            'name' => $lang == "ar" ? $this->name_ar : $this->name_en,
            'answer' => new FaqQuestionsResources($this->faq_questions) ?? null,
        ];
    }
}
