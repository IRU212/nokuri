<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Login\AdminLoginAuthAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginAuthRequest;

final class LoginController extends Controller
{
    /**
     * 管理ログイン画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        $title = 'nokuri | 管理ログイン';
        $description = '管理ログイン画面となります';

        return view('admin.login.index', compact('title', 'description'));
    }

    /**
     * 管理者をログインします
     *
     * @param AdminLoginAuthRequest $request
     * @param AdminLoginAuthAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function auth(AdminLoginAuthRequest $request, AdminLoginAuthAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($request);

        return redirect(route('admin.home.index'));
    }
}
