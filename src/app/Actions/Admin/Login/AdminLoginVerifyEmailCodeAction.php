<?php

namespace App\Actions\Admin\Login;

use App\Exceptions\MissTokenException;
use App\Models\AdminVerifyCode;
use Illuminate\Support\Facades\Log;

final class AdminLoginVerifyEmailCodeAction
{
    /**
     * 管理者のログインを行います
     * 
     * @return void
     */
    public function __invoke(string $token): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        AdminVerifyCode::query()->firstWhere('token', $token)?->email ?? throw new MissTokenException();
    }
}
