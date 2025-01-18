<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

final class HomeController extends Controller
{
    /**
     * ユーザホーム画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('user.home.index');
    }
}
