<?php

namespace App\Actions\User\Register;

use App\Exceptions\MissTokenException;
use App\Models\UncertifiedUser;
use App\Models\User;
use App\Services\UserLoginService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

final class UserRegisterStoreAction
{
    private const TOKEN_LENGTH = 32;
    private const BAD_REQUEST_MESSAGE = '無効なURLです。再度ユーザの登録を行なってください。';

    /**
     * 未認証ユーザをユーザとして登録
     *
     * @param string $token
     * @return void
     */
    public function __invoke(string $token): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        if (\mb_strlen($token) !== self::TOKEN_LENGTH) {
            throw new MissTokenException(self::BAD_REQUEST_MESSAGE);
        }

        $uncertified_user = new UncertifiedUser();

        $uncertified_user_where_token = $uncertified_user->where('token', $token);
        
        if ($uncertified_user_where_token->where('token_deadline_at', '<', now()->addMinute(-30))->exists()) {
            throw new MissTokenException(self::BAD_REQUEST_MESSAGE);
        }

        $uncertified_user_where_token->delete();
        $saved_user = $this->saveUser($uncertified_user->where('token', $token)->first());

        UserLoginService::login($saved_user->id);
    }

    /**
     * ユーザを登録します
     *
     * @param UncertifiedUser $saveing_user
     * @return User
     */
    private function saveUser(UncertifiedUser $saveing_user): User
    {
        $user = new User();
        $user->name = $saveing_user->name;
        $user->email = $saveing_user->email;
        $user->password = Hash::make($saveing_user->password);
        $user->save();
        return $user;
    }
}
