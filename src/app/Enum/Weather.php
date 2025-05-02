<?php

namespace App\Enum;

use App\Contracts\EnumBaseInterface;

enum Weather: int implements EnumBaseInterface {
    // 基本的な天気情報一覧
    case THUNDERSTORM       = 'Thunderstorm';
    case DRIZZLE            = 'Drizzle';
    case RAIN               = 'Rain';
    case SNOW               = 'Snow';
    case CLEAR              = 'Clear';
    case CLOUDS             = 'CLOUDS';
    // 特殊な天気情報一覧
    case MIST               = 'Mist';
    case SMOKE              = 'Smoke';
    case HAZE               = 'Haze';
    case FOG                = 'Fog';
    case SAND               = 'Sand';
    case DUST               = 'Dust';
    case ASH                = 'Ash';
    case SQUALL             = 'Squall';
    case TORNADO            = 'Tornado';

    /**
     * ラベル
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::THUNDERSTORM  => '雷雨',
            self::DRIZZLE       => '霧雨',
            self::RAIN          => '雨',
            self::SNOW          => '雪',
            self::CLEAR         => '晴れ',
            self::CLOUDS        => '曇り',
            self::MIST          => '靄',
            self::SMOKE         => '煙',
            self::HAZE          => '霞',
            self::FOG           => '霧',
            self::SAND          => '砂',
            self::DUST          => '埃・塵',
            self::ASH           => '灰',
            self::SQUALL        => 'スコール',
            self::TORNADO       => 'トルネード',
        };
    }

    /**
     * 天気状態を取得します
     *
     * @return boolean
     */
    public function isSituation(): bool
    {
        return match ($this) {
            self::CLEAR         => true,
            self::CLOUDS        => true,
            default             => false,
        };
    }
}