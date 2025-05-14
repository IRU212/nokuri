<?php

namespace App\Actions\User\SocialiteLogin;

use App\Models\User;
use App\Services\UserLoginService;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

final class SocialiteLoginCallback
{
    /**
     * Google認証を行います
     *
     * @return void
     */
    public function __invoke(): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $user = new User();
        $google_user = Socialite::driver('google')->user();
        $google_user_id = $google_user->getId();

        if ($user::where('google_id', $google_user_id)->exists()) {
            $user = $user::query()->where('google_id', $google_user_id)->where('deleted_at', null)->first();
        } else {
            $user = $this->saveUser($google_user, $google_user_id);
        }

        $user_id = $user->id;

        UserLoginService::login($user_id);
    }

    /**
     * ユーザを登録します
     */
    private function saveUser(\Laravel\Socialite\Contracts\User $google_user, string $google_user_id): User
    {
        $user = new User();
        $user->name = $google_user->getName();
        $user->email = $google_user->getEmail();
        $user->icon_image = $google_user->getAvatar();
        $user->google_id = $google_user_id;
        $user->save();
        return $user;
    }
}
