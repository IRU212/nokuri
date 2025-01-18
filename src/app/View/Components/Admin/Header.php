<?php

namespace App\View\Components\Admin;

use App\Models\AdminUser;
use App\Services\AdminLoginService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class Header extends Component
{
    /**
     * ログイン中管理者ID
     *
     * @var AdminUser
     */
    public readonly AdminUser $login_admin_user;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->login_admin_user = AdminLoginService::loginAdminUser(['id', 'name']);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.header');
    }
}
