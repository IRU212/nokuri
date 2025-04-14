<?php

namespace App\Http\Requests\User\Login;

use Illuminate\Foundation\Http\FormRequest;

final class UserLoginAuthRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'min:6', 'max:25'],
        ];
    }
}
