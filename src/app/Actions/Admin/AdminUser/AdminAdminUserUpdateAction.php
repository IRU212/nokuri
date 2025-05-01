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
        AdminUser::findOrFail($admin_user_id)->fill($request->validated())->save();
    }
}
