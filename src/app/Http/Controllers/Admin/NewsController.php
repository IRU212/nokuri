<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

final class NewsController extends Controller
{
    /**
     * 管理お知らせ一覧画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        $title = 'nokuri | 管理お知らせ';
        $description = '管理お知らせ画面となります';

        return view('admin.news.index', compact('title', 'description'));
    }
}
