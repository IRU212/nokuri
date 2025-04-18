<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait DisplayScope
{
    /**
     * 表示可能か絞り込む
     */
    public function scopeDisplay(Builder $builder): void
    {
        $builder->where('deleted_at', null);
    }
}