<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

final class NewsController extends Controller
{
    /**
     * お知らせ一覧画面を表示します
     *
     * @param AdminNewsIndexAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(AdminNewsIndexAction $action): \Illuminate\Contracts\View\View
    {
        return view('admin.news.index', $action());
    }
}
