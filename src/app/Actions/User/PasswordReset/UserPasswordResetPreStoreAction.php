<?php

namespace App\Actions\User\PasswordReset;

use App\Enum\UserStatus;
use App\Http\Requests\User\PasswordReset\UserPasswordResetPreStoreRequest;
use App\Mail\PasswordResetMail;
use App\Models\PasswordResetUser;
use App\Models\User;

final class UserPasswordResetPreStoreAction
{
    /**
     * パスワードメールを送信する
     *
     * @param UserPasswordResetPreStoreRequest $request
     * @return void
     */
    public function __invoke(UserPasswordResetPreStoreRequest $request): void
    {
        $user = new User();
        $password_reset_user = new PasswordResetUser();
        $request_email = $request->get('email');

        $password_reset_user->where('email', $request_email)->delete();

        $password_reset_user->fill($request->validated());
        $password_reset_user->token_deadline_at = now()->addMinute(30);
        $password_reset_user->token = bin2hex(random_bytes(16));
        $password_reset_user->save();

        $user->where('email', $request_email)->update(['status' => UserStatus::RESET]);

        PasswordResetMail::send(new PasswordResetMail($password_reset_user));
    }
}
