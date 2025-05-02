<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait SearchScope
{
    /**
     * リクエストを絞り込む
     */
    public function scopeWhereRequest(Builder $builder,string $column, bool $strict = true): void
    {
        $value = request()->get($column);

        if ($value === null) {
            return;
        }

        match ($strict) {
            true  => $builder->where($column, $value),
            false => $builder->where($column, 'like', "%{$value}%"),
        };
    }
}
