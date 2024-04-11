<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            //
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'pronoun' => 'required|string|max:255',
            'instagram_handle' => 'nullable|string|regex:/^[a-zA-Z0-9._]+$/|max:30',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ];
    }
}
