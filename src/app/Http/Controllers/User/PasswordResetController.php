<?php

namespace App\Http\Controllers\User;

use App\Actions\User\PasswordReset\UserPasswordResetStoreAction;
use App\Actions\User\PasswordReset\UserPasswordResetUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\PasswordReset\UserPasswordResetStoreRequest;
use App\Http\Requests\User\PasswordReset\UserPasswordResetUpdateRequest;

final class PasswordResetController extends Controller
{
    /**
     * パスワードリセット画面を表示
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('user.password_reset.index');
    }

    public function store(UserPasswordResetStoreRequest $request, UserPasswordResetStoreAction $action)
    {
        $action($request);
        return redirect(route('user.password_reset.complete'));
    }

    public function complete(): \Illuminate\Contracts\View\View
    {
        return view('user.password_reset.complete');
    }

    public function edit(string $token): \Illuminate\Contracts\View\View
    {
        return view('user.password_reset.edit');
    }

    public function update(string $token, UserPasswordResetUpdateRequest $request, UserPasswordResetUpdateAction $action): \Illuminate\Http\RedirectResponse
    {
        $action($request);
        return redirect(route('user.login.index'));
    }
}
