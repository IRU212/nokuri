<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\News\AdminNewsStoreRequest;
use App\Models\News;

final class AdminNewsStoreAction
{
    /**
     * お知らせを登録します
     *
     * @param AdminNewsStoreRequest $request
     * @return void
     */
    public function __invoke(AdminNewsStoreRequest $request): void
    {
        News::query()->fill($request->validated())->save();
    }    
}
