<?php

namespace App\Models;

use App\Models\Traits\DisplayScope;
use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    use DisplayScope;

    /**
     * 複数代入可能な属性
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'code',
    ];

    /**
     * 閲覧権限より大きい権限一覧配列
     */
    public function getViewRolesThan(): array
    {
        return [1, 2, 3, 4];
    }
}
