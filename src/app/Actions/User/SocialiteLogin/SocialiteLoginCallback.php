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
        $google_user_id = $google_user->getId();

        if ($user::where('google_id', $google_user_id)->exists()) {
            $user_id = $user::query()
                ->where('google_id', $google_user_id)
                ->whereNot('deleted_at')
                ->first()
                ->id;
        } else {
            $this->saveUser($google_user, $google_user_id);
        }

        UserLoginService::login($user_id);

        Log::info("user_id:{$user_id},google_id:{$google_user_id}のユーザがログインしました");
    }

    /**
     * ユーザを登録します
     */
    private function saveUser(\Laravel\Socialite\Contracts\User $google_user, int $google_user_id): User
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
