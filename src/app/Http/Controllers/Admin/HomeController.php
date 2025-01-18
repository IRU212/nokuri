<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Home\AdminHomeIndexAction;
use App\Http\Controllers\Controller;

final class HomeController extends Controller
{
    /**
     * 管理ホーム画面を表示します
     *
     * @param AdminHomeIndexAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(AdminHomeIndexAction $action): \Illuminate\Contracts\View\View
    {
        $result = $action();

        $title = 'nokuri | 管理ホーム';
        $description = '管理ホーム画面となります';
        $news_list = $result['news_list'];

        return view('admin.home.index', compact('title', 'description', 'news_list'));
    }
}
