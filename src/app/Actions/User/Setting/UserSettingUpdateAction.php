<?php

namespace App\Actions\User\Setting;

use App\Http\Requests\User\Setting\UserSettingUpdateRequest;
use App\Models\User;
use App\Services\UserLoginService;

final class UserSettingUpdateAction
{
    /**
     * 設定更新
     *
     * @param UserSettingUpdateRequest $request
     * @return void
     */
    public function __invoke(UserSettingUpdateRequest $request): void
    {
        $user = User::findOrFail(UserLoginService::loginId());
        $user->fill($request->validated());
        $user->save();
    }
}
