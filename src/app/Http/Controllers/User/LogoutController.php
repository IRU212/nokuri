<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Logout\UserLogoutAction;
use App\Http\Controllers\Controller;

final class LogoutController extends Controller
{
    /**
     * ユーザのログアウトを行います
     *
     * @param UserLogoutAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserLogoutAction $action): \Illuminate\Http\RedirectResponse
    {
        $action();

        return redirect(route('user.login.index'));
    }
}
