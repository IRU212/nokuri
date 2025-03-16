<?php

namespace App\Actions\User\Login;

use App\Exceptions\MissLoginForNonePassword;
use App\Models\User;
use App\Services\UserLoginService;
use Illuminate\Support\Facades\Request;

final class UserLoginAuthAction
{
    /**
     * ユーザのログイン認証を行います
     *
     * @param Request $request
     * @return void
     */
    public function __invoke(Request $request): void
    {
        $user = User::where('email', $request->input('email'))->first();
        $user_id = $user->id;

        if ($user->password) {
            UserLoginService::login($user_id);
        }
        if ($user->password === null) {
            throw new MissLoginForNonePassword("ユーザ{$user_id}はパスワードを保持していないためGoogle認証でログインが必要です");
        }
    }
}
