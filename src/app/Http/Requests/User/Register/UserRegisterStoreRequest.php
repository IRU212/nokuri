<?php

namespace App\Http\Requests\User\Register;

use Illuminate\Foundation\Http\FormRequest;

final class UserRegisterStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'token'
        ];
    }
}
