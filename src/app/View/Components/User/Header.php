<?php

namespace App\View\Components\User;

use App\Models\User;
use App\Services\UserLoginService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class Header extends Component
{
    /**
     * 一般ユーザログイン判定
     *
     * @var bool
     */
    public readonly bool $is_user_login_in;

    /**
     * 一般ユーザモデル
     *
     * @var User
     */
    public readonly User|null $user;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->is_user_login_in = UserLoginService::is_login();
        $this->user = UserLoginService::user();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.header');
    }
}
