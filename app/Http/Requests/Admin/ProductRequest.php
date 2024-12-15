<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        $productId = $this->route('product') ? $this->route('product')->id : null;
        return [
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products')->ignore($productId),
            ],
            'SKU' => [
                'required',
                'string',
                'max:100',
                Rule::unique('products')->ignore($productId),
            ],
            'price' => 'nullable|numeric',
            'quantity' => 'nullable|integer',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
