<?php

namespace App\Http\Requests\User\Register;

use Illuminate\Foundation\Http\FormRequest;

final class UserRegisterPreStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name',
            'email',
            'password',
            'prefecture',
        ];
    }
}
