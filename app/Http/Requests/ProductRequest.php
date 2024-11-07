<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules()
    {
        return [
    
            'price' => 'required|numeric|min:0',
            'type_discount' => 'required|in:percentage,cash',
            'discount' => ['required', 'numeric', 'min:0', function ($attribute, $value, $fail) {
                $typeDiscount = $this->input('type_discount');
                $price = $this->input('price');
                if ($typeDiscount == 'percentage' && $value >= 100) {
                    $fail('نسبة الخصم يجب ألا تتجاوز 100%.');
                } elseif ($typeDiscount == 'cash' && $value >= $price) {
                    $fail('قيمة الخصم النقدي يجب ألا تتجاوز سعر المنتج.');
                }
            }],
        ];
    }

    public function messages()
    {
        return [
            'price.required' => 'سعر المنتج مطلوب.',
            'price.numeric' => 'يجب أن يكون السعر قيمة رقمية.',
            'type_discount.in' => 'نوع الخصم يجب أن يكون نسبة مئوية أو نقدي.',
            'discount.numeric' => 'يجب أن تكون قيمة الخصم رقمية.',
            'discount.min' => 'قيمة الخصم يجب أن تكون أكبر من أو تساوي صفر.',
        ];
    }

}
