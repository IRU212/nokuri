<?php

namespace App\Actions\Admin\News;

use App\Models\News;
use Illuminate\Support\Facades\Log;

final class AdminNewsIndexAction
{
    /**
     * お知らせ一覧を取得します
     *
     * @return array
     */
    public function __invoke(): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $news_paginate = News::query()
            ->select(['news.id', 'news.name', 'news.email', 'news.created_at'])
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate();

        return [
            'news_paginate' => $news_paginate,
        ];
    }
}
