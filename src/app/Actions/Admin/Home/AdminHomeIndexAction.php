<?php

namespace App\Actions\Admin\Home;

use App\Models\User;
use Illuminate\Support\Facades\Log;

final class AdminHomeIndexAction
{
    private User $user_model;

    /**
     * 初期化処理
     * 
     * @param User $user_model
     */
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
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $user_today_count = $this->user_model->select("id")->display()->count();

        return [
            'user_count'                => $user_today_count,
            'user_today_count'          => $this->user_model->select("id")->display()->today()->count(),
        ];
    }
}
