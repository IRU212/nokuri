<?php

namespace App\Actions\User\Register;

use App\Http\Requests\User\Register\UserRegisterPreStoreRequest;
use App\Jobs\UserAuthenticationJob;
use App\Models\UncertifiedUser;

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
        $uncertified_user = new UncertifiedUser();
        $uncertified_user->fill($request->validated());
        $uncertified_user->token_deadline_at = now()->addMinute(30);
        $uncertified_user->token = bin2hex(random_bytes(16));
        $uncertified_user->save();

        UserAuthenticationJob::dispatch($uncertified_user);
    }
}
