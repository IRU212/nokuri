<?php

namespace App\Http\Requests\User\Setting;

use App\Enum\Prefecture;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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
            'prefecture' => ['nullable', new Enum(Prefecture::class)],
            'age' => ['nullable', 'integer', 'min:1'],
            'weight' => ['nullable', 'integer', 'min:1'],
            'height' => ['nullable', 'integer', 'min:1'],
        ];
    }
}
