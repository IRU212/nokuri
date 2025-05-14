<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Login\AdminLoginAuthAction;
use App\Actions\Admin\Login\AdminLoginVerifyEmailAction;
use App\Actions\Admin\Login\AdminLoginVerifyEmailCodeAction;
use App\Exceptions\MissTokenException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\AdminLoginVerifyEmailRequest;
use Illuminate\Support\Facades\Log;

final class LoginController extends Controller
{
    /**
     * 管理ログイン画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

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
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $token = $action($request);

        return redirect(route('admin.login.verify_email_code', ['token' => $token]));
    }

    /**
     * メール認証コードの検証画面を表示
     * 
     * @param string $token
     * @param AdminLoginVerifyEmailCodeAction $action
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function verifyEmailCode(string $token, AdminLoginVerifyEmailCodeAction $action): \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        try {
            $action($token);
        } catch (MissTokenException $e) {
            Log::error($e->getMessage());
            return redirect(route('admin.login.index'));
        }

        return view('admin.login.email_verification_code');
    }

    /**
     * ログインを行います
     * 
     * @param AdminLoginAuthAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function auth(AdminLoginAuthAction $action): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $action();

        return redirect(route('admin.home.index'));
    }
}
