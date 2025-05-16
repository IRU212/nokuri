<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\AdminUser\AdminAdminUserIndexAction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

final class AdminUserController extends Controller
{
    /**
     * 管理者一覧画面を表示します
     *
     * @param AdminAdminUserIndexAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(AdminAdminUserIndexAction $action): \Illuminate\Contracts\View\View
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return view('admin.admin_user.index', $action());
    }
}
