<?php

namespace App\Http\Requests\User\PasswordReset;

use Illuminate\Foundation\Http\FormRequest;

final class UserPasswordResetPreStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'exists:users,email']
        ];
    }
}
