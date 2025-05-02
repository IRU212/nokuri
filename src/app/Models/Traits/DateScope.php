<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait DateScope
{
    /**
     * 昨日のデータを絞り込む絞り込む
     */
    public function scopeYesterday(Builder $builder, string $column = 'created_at'): void
    {
        $builder->whereDate($column, today()->yesterday());
    }

    /**
     * 今日のデータを絞り込む絞り込む
     */
    public function scopeToday(Builder $builder, string $column = 'created_at'): void
    {
        $builder->whereDate($column, today());
    }

    /**
     * 今週のデータを絞り込む絞り込む
     */
    public function scopeThisWeek(Builder $builder, string $column = 'created_at'): void
    {
        $builder->whereBetween($column, [now()->startOfWeek(), now()->endOfWeek()]);
    }

    /**
     * 明日のデータを絞り込む絞り込む
     */
    public function scopeTomorrow(Builder $builder, string $column = 'created_at'): void
    {
        $builder->whereDate($column, today()->tomorrow());
    }
}
