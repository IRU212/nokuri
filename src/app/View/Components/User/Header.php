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
     * ヘッダー項目
     *
     * @var array
     */
    public readonly array $header_list;

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
        $this->setHeaderList();
        $this->is_user_login_in = UserLoginService::is_login();
        $this->user = UserLoginService::user();
    }

    /**
     * インスタンス変数にセットします
     *
     * @return void
     */
    private function setHeaderList(): void
    {
        $this->header_list = [
            ['link' => route('user.recommendation.muscle_training'), 'label' => 'おすすめの筋トレ', 'is_guest_display' => true],
            ['link' => route('user.setting.index'), 'label' => '設定', 'is_guest_display' => false],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.header');
    }
}
