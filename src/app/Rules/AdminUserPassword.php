<?php

namespace App\Rules;

use App\Models\AdminUser;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Hash;

class AdminUserPassword implements ValidationRule
{
    /**
     * email
     *
     * @var string|null
     */
    public readonly string|null $email;

    /**
     * instance
     *
     * @param string|null $email
     */
    public function __construct(string|null $email)
    {
        $this->email = $email;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $email = $this->email;
        if ($email === null) {
            $fail('メールアドレスを入力してください');
        }

        $admin_user_hashed_password = AdminUser::query()->where('email', $email)->first()->password;

        if (Hash::check($value, $admin_user_hashed_password) === false) {
            $fail('ログインに失敗しました');
        }
    }
}
