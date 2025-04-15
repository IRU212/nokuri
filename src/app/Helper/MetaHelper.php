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

    /**
     * meta タイトル
     * 
     * @return string
     */
    public function title(): string
    {
        return match ($this->route_name) {
            'user.home.index'           => "{$this->app_name}の筋肉 - TOP",
            'user.login.index'          => "{$this->app_name}の筋肉 - ログイン",
            'user.register.index'       => "{$this->app_name}の筋肉 - 新規登録",
            'user.recommendation.index' => "{$this->app_name}の筋肉 - おすすめ",
            'user.wiki.index'           => "{$this->app_name}の筋肉 - Wiki",
            'user.inquiry.index'        => "{$this->app_name}の筋肉 - 問い合わせ",
            'user.setting.index'        => "{$this->app_name}の筋肉 - 設定",
            default                     => "{$this->app_name}の筋肉",
        };
    }

    /**
     * meta 説明文
     * 
     * @return string
     */
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
