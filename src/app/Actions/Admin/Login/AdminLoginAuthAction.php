<?php

namespace App\Actions\Admin\Login;

use App\Exceptions\MissTokenException;
use App\Http\Requests\Admin\Login\AdminLoginAuthRequest;
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

        $code = $request->get('code');

        $admin_verify_code = AdminVerifyCode::query()->firstWhere('code', $code);

        if ($admin_verify_code->isValid() === false) {
            throw new MissTokenException();
        }

        $admin_user = AdminUser::query()->firstWhere('email', $admin_verify_code->email);

        AdminLoginService::login($admin_user->id);
    }
}
