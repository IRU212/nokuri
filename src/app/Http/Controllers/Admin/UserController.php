<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\User\AdminUserIndexAction;
use App\Http\Controllers\Controller;

final class UserController extends Controller
{
    /**
     * ユーザ一覧画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('admin.user.index');
    }
}
