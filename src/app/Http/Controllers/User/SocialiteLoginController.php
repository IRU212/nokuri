<?php

namespace App\Http\Controllers\User;

use App\Actions\User\SocialiteLogin\SocialiteLoginCallback;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

final class SocialiteLoginController extends Controller
{
    /**
     * Google認証URLに遷移します
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
     */
    public function redirect(): \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return Socialite::driver("google")->redirect();
    }

    /**
     * Google認証のユーザ情報を受け取りAP側でログイン処理を行います
     *
     * @param SocialiteLoginCallback $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback(SocialiteLoginCallback $action): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $action();

        return redirect(route('user.home.index'));
    }
}
