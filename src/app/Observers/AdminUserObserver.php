<?php

namespace App\Observers;

use App\Models\AdminUser;

final class AdminUserObserver
{
    /**
     * 管理者の"saving"イベントの処理
     */
    public function saving(AdminUser $admin_user): void
    {
        $admin_user->name = "{$admin_user->name_sei} {$admin_user->name_mei}";
    }
}
