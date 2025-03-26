<?php

namespace App\Http\Requests\User\PasswordReset;

use Illuminate\Foundation\Http\FormRequest;

final class UserPasswordResetStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['exists:users,email'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.exists' => '入力したメールアドレスのユーザが存在しません。'
        ];
    }
}
