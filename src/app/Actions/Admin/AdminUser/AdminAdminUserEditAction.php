<?php

namespace App\Actions\Admin\AdminUser;

use App\Models\AdminUser;

final class AdminAdminUserEditAction
{
    /**
     * 管理者詳細を取得します
     *
     * @param integer $admin_user_id
     * @return AdminUser
     */
    public function __invoke(int $admin_user_id): AdminUser
    {
        return AdminUser::findOrFail($admin_user_id);
    }
}
