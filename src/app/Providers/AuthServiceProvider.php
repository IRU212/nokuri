<?php

namespace App\Providers;

use App\Models\AdminRole;
use App\Models\AdminUser;
use App\Services\AdminLoginService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    private int|null $admin_user_login_role;

    /**
     * 初期化処理
     */
    public function __construct()
    {
        $this->admin_user_login_role = AdminLoginService::loginAdminUser()?->role;
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::allows('is_master_view', function (AdminRole $admin_role) {
            return \in_array($this->admin_user_login_role, $admin_role->getViewRolesThan());
        });
        Gate::allows('is_master_edit', function (AdminRole $admin_role) {
            return \in_array($this->admin_user_login_role, $admin_role->getViewRolesThan());
        });
    }
}
