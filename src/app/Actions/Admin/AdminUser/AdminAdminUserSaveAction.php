<?php

namespace App\Actions\Admin\AdminUser;

use App\Http\Requests\Admin\AdminUser\AdminAdminUserSaveRequest;
use App\Models\AdminUser;

final class AdminAdminUserSaveAction
{
    /**
     * 管理者を保存します
     *
     * @param AdminAdminUserSaveRequest $request
     * @return void
     */
    public function __invoke(AdminAdminUserSaveRequest $request): void
    {
        $admin_user = new AdminUser();
        $admin_user->saveAdminUser($request->validated());
    }
}
