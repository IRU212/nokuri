<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Login\UserLoginAuthAction;
use App\Exceptions\MissLoginForNonePassword;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Login\UserLoginAuthRequest;
use Illuminate\Support\Facades\Log;

final class LoginController extends Controller
{
    /**
     * ユーザのログイン画面を表示しました
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        $title = 'nokuri | ログイン';
        $description = 'nokuriのログイン画面となります。';

        return view('user.login.index', compact('title', 'description'));
    }

    /**
     * ユーザのログインを行います
     *
     * @param UserLoginAuthRequest $request
     * @param UserLoginAuthAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function auth(UserLoginAuthRequest $request, UserLoginAuthAction $action): \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\View
    {
        try {
            $action($request);
        } catch (MissLoginForNonePassword $e) {
            Log::warning($e->getMessage());
            return view(route('user.login.index'));
        }

        return redirect(route('user.home.index'));
    }
}
