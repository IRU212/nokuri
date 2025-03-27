<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Home\UserHomeIndexAction;
use App\Http\Controllers\Controller;

final class HomeController extends Controller
{
    /**
     * ユーザホーム画面を表示します
     *
     * @param UserHomeIndexAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(UserHomeIndexAction $action): \Illuminate\Contracts\View\View
    {
        $result = $action();

        return view('user.home.index', $result);
    }
}
