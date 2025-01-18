<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\User\AdminUserIndexAction;
use App\Http\Controllers\Controller;

final class UserController extends Controller
{
    /**
     * ユーザ一覧画面を表示します
     *
     * @param AdminUserIndexAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(AdminUserIndexAction $action): \Illuminate\Contracts\View\View
    {
        $result = $action();

        $title = 'nokuri | 管理ユーザ一覧';
        $description = '管理ユーザ一覧画面となります';
        $user_list_paginate = $result['user_list_paginate'];

        return view('admin.user.index', compact('title', 'description', 'user_list_paginate'));
    }

    /**
     * ユーザ作成画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        $title = 'nokuri | 管理ユーザ作成';
        $description = '管理ユーザ作成画面となります';

        return view('admin.user.create', compact('title', 'description'));
    }

    /**
     * ユーザ編集画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(): \Illuminate\Contracts\View\View
    {
        $title = 'nokuri | 管理ユーザ編集';
        $description = '管理ユーザ編集画面となります';

        return view('admin.user.create', compact('title', 'description'));
    }
}
