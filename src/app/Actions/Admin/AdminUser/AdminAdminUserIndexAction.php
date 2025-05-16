<?php

namespace App\Actions\Admin\AdminUser;

use App\Models\AdminUser;
use Illuminate\Support\Facades\Log;

final class AdminAdminUserIndexAction
{
    /**
     * 管理者一覧を取得します
     *
     * @return array
     */
    public function __invoke(): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $admin_users_paginate = AdminUser::query()
            ->select([
                'admin_users.id', 
                'admin_users.name', 
                'admin_users.email', 
                'admin_users.created_at'
            ])
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate();

        return [
            'admin_users_paginate' => $admin_users_paginate,
        ];
    }
}
