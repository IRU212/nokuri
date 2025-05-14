<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Logout\AdminLogoutClearAuthAction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

final class LogoutController extends Controller
{
    /**
     * 管理者のログアウトを行います
     *
     * @param AdminLogoutClearAuthAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clearAuth(AdminLogoutClearAuthAction $action): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $action();

        return redirect(route('admin.login.index'));
    }
}
