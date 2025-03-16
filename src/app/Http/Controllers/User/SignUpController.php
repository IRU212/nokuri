<?php

namespace App\Http\Controllers\User;

use App\Actions\User\SignUp\UserSignUpPreRegisterAction;
use App\Actions\User\SignUp\UserSignUpRegisterAction;
use App\Http\Controllers\Controller;

final class SignUpController extends Controller
{
    /**
     * ユーザの新規登録画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('user.sign_up.index');
    }

    /**
     * ユーザの新規登録前処理を行います
     *
     * @param UserSignUpPreRegisterAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function preRegister(UserSignUpPreRegisterAction $action): \Illuminate\Contracts\View\View
    {
        $action();

        return view('user.sign_up.pre_register');
    }

    /**
     * ユーザの新規登録を行います
     *
     * @param UserSignUpRegisterAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(UserSignUpRegisterAction $action): \Illuminate\Http\RedirectResponse
    {
        $action();

        return redirect(route('user.home.index'));
    }
}
