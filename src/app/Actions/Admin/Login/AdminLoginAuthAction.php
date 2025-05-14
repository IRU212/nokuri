<?php

namespace App\Actions\Admin\Login;

use App\Http\Requests\AdminLoginAuthRequest;
use App\Models\AdminUser;
use App\Models\AdminVerifyCode;
use App\Services\AdminLoginService;
use Illuminate\Support\Facades\Log;

final class AdminLoginAuthAction
{
    /**
     * 管理者をログインします
     *
     * @param AdminLoginAuthRequest $request
     * @return void
     */
    public function __invoke(AdminLoginAuthRequest $request): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $admin_verify_code_email = AdminVerifyCode::query()->firstWhere('token', $request->token)->email;
        $admin_user = AdminUser::query()->firstWhere('email', $admin_verify_code_email);

        AdminLoginService::login($admin_user->id);
    }
}
