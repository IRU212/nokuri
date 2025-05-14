<?php

namespace App\Actions\User\Register;

use App\Http\Requests\User\Register\UserRegisterPreStoreRequest;
use App\Mail\UserAuthenticationMail;
use App\Models\UncertifiedUser;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

final class UserRegisterPreStoreAction
{
    /**
     * 未認証ユーザを作成します
     *
     * @param UserRegisterPreStoreRequest $request
     * @return void
     */
    public function __invoke(UserRegisterPreStoreRequest $request): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $uncertified_user = new UncertifiedUser();
        $uncertified_user->fill($request->validated());
        $uncertified_user->token_deadline_at = now()->addMinute(30);
        $uncertified_user->token = bin2hex(random_bytes(16));
        $uncertified_user->save();

        Mail::send(new UserAuthenticationMail($uncertified_user));
    }
}
