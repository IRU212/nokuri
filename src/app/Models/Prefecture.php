<?php

namespace App\Models;

use App\Models\Traits\DisplayScope;
use Illuminate\Database\Eloquent\Model;

final class Prefecture extends Model
{
    use DisplayScope;

    protected $fillable = [
        'code',
        'name',
        'prefectural_capital',
    ];

    /**
     * キャストする属性の取得
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'prefecture';
}
