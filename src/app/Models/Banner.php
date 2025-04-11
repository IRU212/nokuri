<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Banner extends Model
{
    /**
     * 複数代入可能な属性
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'image',
        'sort',
        'created_at',
        'updated_at',
    ];
}
