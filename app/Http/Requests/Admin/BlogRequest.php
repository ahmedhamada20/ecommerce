<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug,' .$this->id,
            'rate' => 'nullable|numeric|min:0|max:5',
            'short_description_ar' => 'required|string|max:500',
            'short_description_en' => 'required|string|max:500',
            'description_ar' => 'required|string|max:500',
            'description_en' => 'required|string|max:500',
            'notes_ar' => 'nullable|string',
            'notes_en' => 'nullable|string',
            'count_view' => 'nullable|integer|min:0',
            'count_comments' => 'nullable|integer|min:0',
        ];
    }
}
