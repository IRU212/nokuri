<?php

namespace App\Actions\User\PasswordReset;

use App\Http\Requests\User\PasswordReset\UserPasswordResetUpdateRequest;

final class UserPasswordResetUpdateAction
{
    public function __invoke(UserPasswordResetUpdateRequest $request): void
    {
        // DBのパスワードを更新します
        // 再パスワードトークンを削除します
        // 変更完了メールを送信します
    }
}
