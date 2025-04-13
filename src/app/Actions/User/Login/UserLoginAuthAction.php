<?php

namespace App\Actions\User\Login;

use App\Exceptions\MissLoginForNonePassword;
use App\Exceptions\ModelSoftDeletedException;
use App\Http\Requests\User\Login\UserLoginAuthRequest;
use App\Models\User;
use App\Services\UserLoginService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

final class UserLoginAuthAction
{
    /**
     * ユーザのログイン認証を行います
     *
     * @param Request $request
     * @return void
     */
    public function __invoke(UserLoginAuthRequest $request): void
    {
        $user = User::where('email', $request->input('email'))->first();
        $user_id = $user->id;

        if ($user->deleted_at) {
            throw new ModelSoftDeletedException("ユーザ{$user_id}は論理削除済み");
        }
        if ($user->password === null) {
            throw new MissLoginForNonePassword("ユーザ{$user_id}はパスワードを保持していないためGoogle認証でログインが必要");
        }
        if (Hash::check($request->get('password'), $user->password)) {
            UserLoginService::login($user_id);
        }
    }
}
