<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Logout\AdminLogoutClearAuthAction;
use App\Http\Controllers\Controller;

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
        $action();

        return redirect(route('admin.login.index'));
    }
}
