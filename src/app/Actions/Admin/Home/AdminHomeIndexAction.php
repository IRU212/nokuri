<?php

namespace App\Actions\Admin\Home;

final class AdminHomeIndexAction
{
    /**
     * ホーム画面のデータを取得します
     *
     * @return array
     */
    public function __invoke(): array
    {
        $result = [];

        $news_list = [
            ['id' => 1, 'title' => 'お知らせ1'],
            ['id' => 2, 'title' => 'お知らせ2'],
            ['id' => 3, 'title' => 'お知らせ3'],
            ['id' => 4, 'title' => 'お知らせ4'],
            ['id' => 5, 'title' => 'お知らせ5'],
        ];
        $result['news_list'] = \json_decode(\json_encode($news_list));

        return $result;
    }
}
