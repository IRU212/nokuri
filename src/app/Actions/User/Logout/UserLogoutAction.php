<?php

namespace App\Actions\User\Logout;

use App\Services\UserLoginService;

final class UserLogoutAction
{
    /**
     * ユーザのログアウトを行います
     *
     * @return void
     */
    public function __invoke(): void
    {
        UserLoginService::logout();
    }
}