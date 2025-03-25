<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;

final class AdminNewsEditAction
{
    /**
     * 編集画面に表示するお知らせを取得します
     *
     * @param integer $news_id
     * @return array
     */
    public function __invoke(int $news_id): array
    {
        return News::query()->findOrFail($news_id)->toArray();
    }
}
