<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Register\UserRegisterPreStoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Register\UserRegisterPreStoreRequest;
use Illuminate\Http\Request;

final class RegisterController extends Controller
{
    /**
     * ユーザの新規登録画面を表示します
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('user.register.index');
    }

    /**
     * ユーザの新規前登録処理を行います
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function preStore(UserRegisterPreStoreRequest $request, UserRegisterPreStoreAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($request);
        return redirect(route('user.register.pre_complete'));
    }

    /**
     * ユーザの新規前登録画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */  
    public function preComplete(): \Illuminate\Contracts\View\View
    {
        return view('user.register.pre_complete');
    }

    /**
     * ユーザの新規登録を行います
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(): \Illuminate\Http\RedirectResponse
    {
        return redirect(route('user.home.index'));
    }
}
