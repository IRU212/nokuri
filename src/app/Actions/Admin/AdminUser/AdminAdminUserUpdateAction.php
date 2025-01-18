<?php

namespace App\Actions\Admin\AdminUser;

use App\Http\Requests\Admin\AdminUser\AdminAdminUserUpdateRequest;
use App\Models\AdminUser;

final class AdminAdminUserUpdateAction
{
    /**
     * 管理者ユーザを更新します
     *
     * @param integer $admin_user_id
     * @param AdminAdminUserUpdateRequest $request
     * @return void
     */
    public function __invoke(int $admin_user_id, AdminAdminUserUpdateRequest $request): void
    {
        $admin_user = AdminUser::query()->findOrFail($admin_user_id);
        $admin_user->fill([]);
        $admin_user->save();
    }
}
