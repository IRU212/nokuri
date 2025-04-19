<?php

namespace App\Actions\Admin\User;

use App\Models\User;

final class AdminUserIndexAction
{
    public function __invoke(): array
    {
        $user_list_paginate = User::query()
            ->select(['id', 'name', 'email', 'gender', 'status', 'created_at'])
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate();

        return [
            'user_list_paginate' => $user_list_paginate,
        ];
    }
}
