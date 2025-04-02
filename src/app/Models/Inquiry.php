<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Inquiry extends Model
{
    /**
     * 複数代入可能な属性
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'content',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
