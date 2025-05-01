<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Collection;

trait DisplayScope
{
    /**
     * オプション一覧をコレクションで取得しますします
     */
    public function optionCollection(): Collection
    {
        return $this->query()->select(['id', 'name'])->where('deleted_at', null)->get();
    }

    /**
     * オプション一覧を配列で取得しますします
     */
    public function optionArray(): array
    {
        return $this->optionCollection()->toArray();
    }
}
