<?php

namespace App\Http\Controllers\User;

use App\Actions\User\PasswordReset\UserPasswordResetPreStoreAction;
use App\Exceptions\MissTokenException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\PasswordReset\UserPasswordResetPreStoreRequest;
use Illuminate\Support\Facades\Log;

final class PasswordResetController extends Controller
{
    /**
     * パスワードリセット画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return view('user.password_reset.index');
    }

    /**
     * パスワードリセットメールを送信します
     *
     * @param UserPasswordResetPreStoreRequest $request
     * @param UserPasswordResetPreStoreAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function preStore(UserPasswordResetPreStoreRequest $request, UserPasswordResetPreStoreAction $action): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $action($request);

        return redirect(route('user.password_reset.pre_complete'));
    }

    /**
     * ユーザの新規前登録画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function preComplete(): \Illuminate\Contracts\View\View
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return view('user.password_reset.pre_complete');
    }

    /**
     * パスワードリセットを承認します
     *
     * @param string $token
     * @param UserPasswordResetPreStoreAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(string $token, UserPasswordResetPreStoreAction $action): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        try {
            $action($token);
        } catch (MissTokenException $e) {
            Log::error($e->getMessage());
            return redirect(route('user.password_reset.index'));
        }

        return redirect(route('user.home.index'));
    }
}
