<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'address' => 'nullable|string|max:255',
            'region' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'building_number' => 'nullable|string|max:50',
            'floor' => 'nullable|string|max:50',
            'street' => 'nullable|string|max:255',
            'landmark' => 'nullable|string|max:255',
            'type' => 'nullable|in:essential,sub',
            'columns' => 'nullable|json',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'The user ID is required.',
            'user_id.exists' => 'The selected user does not exist.',
            'type.in' => 'The type must be either essential or sub.',
        ];
    }

}
