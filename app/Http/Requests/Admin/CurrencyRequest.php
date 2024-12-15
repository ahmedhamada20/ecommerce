<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
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
            'type' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'rate' => 'nullable|numeric',
            'is_active' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name_ar.required' => 'Arabic name is required.',
            'name_en.required' => 'English name is required.',
        ];
    }
}
