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
        return view('admin.home.index');
    }
}
