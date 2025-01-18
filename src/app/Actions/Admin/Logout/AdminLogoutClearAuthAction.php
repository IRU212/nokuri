<?php

namespace App\Actions\Admin\Logout;

use App\Services\AdminLoginService;

final class AdminLogoutClearAuthAction
{
    /**
     * 管理者をログアウト
     *
     * @return void
     */
    public function __invoke(): void
    {
        AdminLoginService::logout();
    }
}
