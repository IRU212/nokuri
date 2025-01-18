<?php

namespace App\Http\Controllers\User;

use App\Actions\User\SocialiteLogin\SocialiteLoginCallback;
use App\Http\Controllers\Controller;
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
        $action();

        return redirect(route('user.home.index'));
    }
}
