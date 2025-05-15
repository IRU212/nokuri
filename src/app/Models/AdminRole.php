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
        'name',
        'code',
    ];
}
