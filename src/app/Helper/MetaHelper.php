<?php

namespace App\Helper;

use Illuminate\Support\Facades\Route;

final class MetaHelper
{
    private readonly string $route_name;

    private readonly string $app_name;

    /**
     * 初期化処理
     */
    public function __construct()
    {
        $this->route_name = Route::currentRouteName();
        $this->app_name = config('app.name');
    }

    public function title(): string
    {
        return match ($this->route_name) {
            'user.home.index'           => "{$this->app_name}の筋肉筋トレサイト - TOP",
            'user.login.index'          => "{$this->app_name}の筋肉筋トレサイト - ログイン",
            'user.register.index'       => "{$this->app_name}の筋肉筋トレサイト - 新規登録",
            'user.recommendation.index' => "{$this->app_name}の筋肉筋トレサイト - おすすめ",
            'user.wiki.index'           => "{$this->app_name}の筋肉筋トレサイト - Wiki",
            'user.inquiry.index'        => "{$this->app_name}の筋肉筋トレサイト - 問い合わせ",
            'user.setting.index'        => "{$this->app_name}の筋肉筋トレサイト - 設定",
            default                     => "{$this->app_name}の筋肉筋トレサイト",
        };
    }

    public function description(): string
    {
        return match ($this->route_name) {
            'user.home.index'           => "",
            'user.login.index'          => "",
            'user.register.index'       => "",
            'user.recommendation.index' => "",
            'user.wiki.index'           => "",
            'user.inquiry.index'        => "",
            'user.setting.index'        => "",
            default                     => "",
        };
    }
}
