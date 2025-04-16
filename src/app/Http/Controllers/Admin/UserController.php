<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\User\AdminUserIndexAction;
use App\Http\Controllers\Controller;
use App\Models\User;

final class UserController extends Controller
{
    /**
     * ユーザ一覧画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(AdminUserIndexAction $action): \Illuminate\Contracts\View\View
    {
        return view('admin.user.index', $action());
    }

    /**
     * ユーザ登録画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        return view('admin.user.create');
    }

    /**
     * ユーザ編集画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        return view('admin.user.edit', ['user' => User::query()->findOrFail($id)]);
    }
}
