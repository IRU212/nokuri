<?php

namespace App\Actions\User\Setting;

use App\Services\UserLoginService;

final class UserSettingIndexAction
{
    /**
     * 設定で表示する情報を取得
     *
     * @return array
     */
    public function __invoke(): array
    {        
        return [
            'user' => UserLoginService::user(),
        ];
    }
}
