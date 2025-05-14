<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Login\AdminLoginVerifyEmailAction;
use App\Actions\Admin\Login\AdminLoginVerifyEmailCodeAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\AdminLoginVerifyEmailRequest;

final class LoginController extends Controller
{
    /**
     * 管理ログイン画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('admin.login.index');
    }

    /**
     * メール認証を行います
     * 
     * @param AdminLoginVerifyEmailRequest $request
     * @param AdminLoginVerifyEmailAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verifyEmail(AdminLoginVerifyEmailRequest $request, AdminLoginVerifyEmailAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($request);

        return redirect(route('admin.login.verify_email_code'));
    }

    /**
     * メール認証コードの検証画面を表示
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function verifyEmailCode(string $token, AdminLoginVerifyEmailCodeAction $action): \Illuminate\Contracts\View\View
    {
        return view('admin.login.email_verification_code');
    }

    /**
     * ログインを行います
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function auth(): \Illuminate\Http\RedirectResponse
    {
        return redirect(route('admin.home.index'));
    }
}
