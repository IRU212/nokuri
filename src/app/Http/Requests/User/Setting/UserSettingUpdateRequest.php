<?php

namespace App\Http\Requests\User\Setting;

use Illuminate\Foundation\Http\FormRequest;

final class UserSettingUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:5', 'max:100'],
            'email' => ['required', 'email', 'exists:users,email'],
            'prefecture' => ['nullable', 'exists:prefecture.id']
        ];
    }
}
