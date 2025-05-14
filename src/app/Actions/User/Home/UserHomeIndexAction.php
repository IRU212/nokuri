<?php

namespace App\Actions\User\Home;

use App\Models\Banner;
use App\Models\News;
use Illuminate\Support\Facades\Log;

final class UserHomeIndexAction
{
    /**
     * ホーム画面に表示するデータを取得します
     *
     * @return array
     */
    public function __invoke(): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return [
            'news_list' => $this->getNewsArray(),
            'banners' => $this->getBannerArray(),
        ];
    }

    /**
     * お知らせ一覧を取得
     *
     * @return array
     */
    private function getNewsArray(): array
    {
        return News::query()
            ->select(['title', 'created_at'])
            ->limit(5)
            ->orderByDesc('id')
            ->get()
            ->toArray();
    }

    /**
     * バナー一覧を取得
     *
     * @return array
     */
    private function getBannerArray(): array
    {
        return Banner::query()
            ->select(['image'])
            ->limit(3)
            ->orderBy('sort')
            ->get()
            ->toArray();
    }
}
