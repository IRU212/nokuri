<?php

namespace App\Actions\Admin\Home;

use App\Models\User;

final class AdminHomeIndexAction
{
    private User $user_model;

    public function __construct(User $user_model)
    {
        $this->user_model = $user_model;
    }

    /**
     * ホーム画面のデータを取得します
     *
     * @return array
     */
    public function __invoke(): array
    {
        return [
            'user_count'        => $this->user_model->select("id")->display()->count(),
            'user_today_count'  => $this->user_model->select("id")->display()->today()->count(),
        ];
    }
}
