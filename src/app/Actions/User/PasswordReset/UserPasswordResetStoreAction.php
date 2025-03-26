<?php

namespace App\Actions\User\PasswordReset;

use App\Http\Requests\User\PasswordReset\UserPasswordResetStoreRequest;
use App\Models\UserPasswordReset;
use App\Services\SendGridService;

final class UserPasswordResetStoreAction
{
    /**
     * ユーザのパスワード再設定メールを送信します
     *
     * @param UserPasswordResetStoreRequest $request
     * @return void
     */
    public function __invoke(UserPasswordResetStoreRequest $request): void
    {
        $to_address = $request->email;
        $user_password_reset = new UserPasswordReset();

        $user_password_reset_where = $user_password_reset->where('to_address', $to_address);
        if ($user_password_reset_where->exists()) {
            $user_password_reset_where->update(['deleted_at' => now()]);
        }

        $user_password_reset->to_address    = $to_address;
        $user_password_reset->from_address  = config('mail.from.address');
        $user_password_reset->token         = str_random(32);
        $user_password_reset->expires_at    = now()->addMinute(10);
        $user_password_reset->save();

       $send_grid = new SendGridService();
       $send_grid->snedMail('パスワード再設定メール', $to_address, 'main.user.password_reset');
    }
}
