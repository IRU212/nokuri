<?php

namespace App\Actions\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Log;

final class AdminUserIndexAction
{
    /**
     * ユーザ一覧を取得します
     *
     * @return array
     */
    public function __invoke(): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $user_list_paginate = User::query()
            ->select([
                'users.id', 
                'users.name', 
                'users.email', 
                'users.gender', 
                'users.status', 
                'users.prefecture_id', 
                'users.created_at'
            ])
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate();

        return [
            'user_list_paginate' => $user_list_paginate,
        ];
    }
}
