<?php

namespace App\Actions\Admin\Logout;

use App\Services\AdminLoginService;
use Illuminate\Support\Facades\Log;

final class AdminLogoutClearAuthAction
{
    /**
     * 管理者をログアウト
     *
     * @return void
     */
    public function __invoke(): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        AdminLoginService::logout();
    }
}
