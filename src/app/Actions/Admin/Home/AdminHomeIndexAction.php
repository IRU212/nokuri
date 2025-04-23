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
        $user = new User();

        $user_count = $user->query()->select("id")->where("deleted_at", null)->count();
        $user_today_count = $user->query()->select("id")->where("deleted_at", null)->whereDate('created_at', today())->count();

        return [
            'user_count' => $user_count,
            'user_today_count' => $user_today_count,
        ];
    }
}
