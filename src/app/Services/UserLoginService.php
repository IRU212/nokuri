<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

final class UserLoginService
{
    /**
     * ユーザをログイン状態にします
     *
     * @param integer $user_id
     * @return void
     */
    public static function login(int $user_id): void
    {
        Log::info("ユーザ{$user_id}のログインを行うためセッション登録を行います。");

        session(['user_id' => $user_id]);
    }

    /**
     * ユーザがログイン状態か返します
     *
     * @return boolean
     */
    public static function is_login(): bool
    {
        return session('user_id') !== null;
    }

    /**
     * ユーザをログアウトにします
     *
     * @return void
     */
    public static function logout(): void
    {
        $user_id = session('user_id');

        Log::info("ユーザ{$user_id}のログアウトを行うためセッション削除を行います。");

        session(['user_id' => null]);
    }
}
