<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminRole;
use Illuminate\Support\Facades\Log;

final class AdminRoleController extends Controller
{
    /**
     * 管理者権限一覧画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return view('admin.admin_role.index', ['admin_roles' => AdminRole::query()->display()->get()]);
    }
}
