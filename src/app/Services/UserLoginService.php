<?php

namespace App\Services;

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
        session(['user_id' => $user_id]);
    }
}
