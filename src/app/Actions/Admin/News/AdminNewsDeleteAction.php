<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\News\AdminNewsDeleteRequest;
use App\Models\News;

final class AdminNewsDeleteAction
{
    /**
     * お知らせを削除します
     *
     * @param AdminNewsDeleteRequest $request
     * @return void
     */
    public function __invoke(AdminNewsDeleteRequest $request): void
    {
        News::query()->findOrFail($request->get('news_id'))->delete();
    }
}
