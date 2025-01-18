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
        $user = new User();
        $google_user = Socialite::driver('google')->user();

        $user_id = null;
        $google_user_name = $google_user->getName();
        $google_user_email = $google_user->getEmail();
        $google_user_avater = $google_user->getAvatar();
        $google_user_id = $google_user->getId();

        if ($user::where('google_id', $google_user_id)->exists()) {
            $user_id = $user::query()->where('google_id', $google_user_id)->first()->id;
        } else {
            $save_data = [
                'name' => $google_user_name,
                'email' => $google_user_email,
                'icon_image' => $google_user_avater,
                'google_id' => $google_user_id,
            ];
            $user_id = $user->saveUser($save_data)->id;
        }

        UserLoginService::login($user_id);

        Log::info("user_id:{$user_id},google_id:{$google_user_id}のユーザがログインします");
    }
}
