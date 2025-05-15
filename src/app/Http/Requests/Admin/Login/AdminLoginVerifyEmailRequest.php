<?php

namespace App\Http\Requests\Admin\Login;

use Illuminate\Foundation\Http\FormRequest;

final class AdminLoginVerifyEmailRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:admin_users,email'],
            'password' => ['required', 'min:5', 'max:20'],
        ];
    }
}