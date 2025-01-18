<?php

namespace App\Actions\Admin\User;

use App\Models\User;

final class AdminUserIndexAction
{
    public function __invoke()
    {
        $result = [];

        $user = new User();

        $result['user_list_paginate'] = $user::query()
            ->select(['id', 'nickname', 'email', 'status', 'created_at'])
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate();

        return $result;
    }
}
