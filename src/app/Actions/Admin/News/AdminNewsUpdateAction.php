<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\News\AdminNewsUpdateRequest;
use App\Models\News;

final class AdminNewsUpdateAction
{
    /**
     * お知らせを更新します
     *
     * @param integer $news_id
     * @param AdminNewsUpdateRequest $request
     * @return void
     */
    public function __invoke(int $news_id, AdminNewsUpdateRequest $request): void
    {
        News::query()->findOrFail($news_id)->update($request->validated());
    }
}
