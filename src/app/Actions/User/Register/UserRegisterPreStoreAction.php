<?php

namespace App\Actions\User\Register;

use App\Http\Requests\User\Register\UserRegisterPreStoreRequest;
use App\Models\User;

final class UserRegisterPreStoreAction
{
    public function __invoke(UserRegisterPreStoreRequest $request): void
    {
        $user = new User();
        $user->is_uncertified = true;
        $user->fill($request->validated());
        $user->save();

        // メールDBを作成します
        // メール送信をします
    }
}
