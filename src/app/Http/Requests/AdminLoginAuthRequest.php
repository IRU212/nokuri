<?php

namespace App\Http\Requests;

use App\Rules\AdminUserPassword;
use Illuminate\Foundation\Http\FormRequest;

final class AdminLoginAuthRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'exists:admin_users,email'],
            'password' => ['required', new AdminUserPassword($this->email)]
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        $login_miss_message = 'ログインに失敗しました';

        return [
            'email.required' => 'メールアドレスを入力してください',
            'email.exists' => $login_miss_message,
            'password.required' => 'パスワードを入力してください',
        ];
    }
}
