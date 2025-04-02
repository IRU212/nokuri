<?php

namespace App\Actions\User\Home;

use App\Models\News;

final class UserHomeIndexAction
{
    /**
     * ホーム画面に表示するデータを取得します
     *
     * @return array
     */
    public function __invoke(): array
    {
        return [
            'news_list' => News::query()->limit(5)->get()->toArray(),
        ];
    }
}
