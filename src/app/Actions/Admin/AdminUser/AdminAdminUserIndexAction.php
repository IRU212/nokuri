<?php

namespace App\Actions\Admin\AdminUser;

use App\Models\AdminUser;

final class AdminAdminUserIndexAction
{
    /**
     * 管理者一覧を取得します
     *
     * @return array
     */
    public function __invoke(): array
    {
        $result = [];

        $admin_user = new AdminUser();
        $result['admin_user_list_paginate'] = $admin_user::query()
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate();

        return $result;
    }
}
