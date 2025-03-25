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
        $news_list = News::query()->limit(5)->get()->toArray();

        return [
            'news_list' => $news_list,
        ];
    }
}
