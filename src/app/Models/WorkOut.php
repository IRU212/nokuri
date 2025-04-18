<?php

namespace App\Models;

use App\Models\Traits\DisplayScope;
use Illuminate\Database\Eloquent\Model;

final class WorkOut extends Model
{
    use DisplayScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'is_bodyweight',
        'is_exercise_equipment',
        'deleted_at',
    ];
}
