<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     */
    public function rules(): array
    {
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . ($this->user ?? 'NULL') . ',id',
            'phone' => 'required|string|max:15|unique:users,phone,' . ($this->user ?? 'NULL') . ',id',
            'gender' => 'nullable|in:man,female',
            'password' => $this->isMethod('post') ? 'required|string|min:6|confirmed' : 'nullable|string|min:6|confirmed',
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'The first name is required.',
            'last_name.required' => 'The last name is required.',
            'email.required' => 'The email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already in use.',
            'phone.required' => 'The phone number is required.',
            'gender.in' => 'The gender must be either man or female.',
            'type.in' => 'The type must be either admin or customer.',
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 6 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
        ];
    }
}
