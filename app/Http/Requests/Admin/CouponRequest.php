<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'code' => 'required|string|max:255|unique:coupons,code,' . $this->id,
            'type_code' => 'required|in:1,2',
            'discount_value' => 'nullable|numeric|min:0',
            'discount_type' => 'nullable|in:cash,relative',
            'max_used' => 'nullable|integer|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
//            'status' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Coupon code is required.',
            'start_date.required' => 'Start date is required.',
            'end_date.required' => 'End date is required.',
        ];
    }
}
