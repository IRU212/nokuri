<?php

namespace App\Actions\Admin\Login;

use App\Http\Requests\AdminLoginAuthRequest;
use App\Models\AdminUser;
use App\Services\AdminLoginService;

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
        $admin_user = new AdminUser();

        $admin_user_id = $admin_user::where('email', $request->input('email'))->first()->id;

        AdminLoginService::login($admin_user_id);
    }
}
