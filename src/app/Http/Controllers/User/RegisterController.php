<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Register\UserRegisterPreStoreAction;
use App\Actions\User\Register\UserRegisterStoreAction;
use App\Exceptions\MissTokenException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Register\UserRegisterPreStoreRequest;
use Illuminate\Support\Facades\Log;

final class RegisterController extends Controller
{
    /**
     * ユーザの新規登録画面を表示します
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return view('user.register.index');
    }

    /**
     * ユーザの新規前登録処理を行います
     *
     * @param UserRegisterPreStoreRequest $request
     * @param UserRegisterPreStoreAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function preStore(UserRegisterPreStoreRequest $request, UserRegisterPreStoreAction $action): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

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
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return view('user.register.pre_complete');
    }

    /**
     * ユーザの新規登録を行います
     *
     * @param string $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(string $token, UserRegisterStoreAction $action): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        try {
            $action($token);
        } catch (MissTokenException $e) {
            Log::error($e->getMessage());
            return redirect(route('user.register.index'));
        }

        return redirect(route('user.home.index'));
    }
}
