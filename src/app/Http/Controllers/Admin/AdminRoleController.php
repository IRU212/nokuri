<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminRole;

final class AdminRoleController extends Controller
{
    /**
     * 管理者権限一覧画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('admin.admin_role.index', ['admin_roles' => AdminRole::query()->display()->get()]);
    }
}
