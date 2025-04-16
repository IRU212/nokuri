<?php

namespace App\Actions\Admin\Home;

use App\Models\User;

final class AdminHomeIndexAction
{
    /**
     * ホーム画面のデータを取得します
     *
     * @return array
     */
    public function __invoke(): array
    {
        return [
            'user_count' => User::query()->select("id")->where("deleted_at", null)->sum("id"),
        ];
    }
}
