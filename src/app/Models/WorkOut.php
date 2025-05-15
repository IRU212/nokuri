<?php

namespace App\Models;

use App\Enum\SpecificArea;
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
        'main_specific_area',
        'deleted_at',
    ];

    /**
     * キャストする属性の取得
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'main_specific_area'    => SpecificArea::class,
            'created_at'            => 'datetime',
            'updated_at'            => 'datetime',
            'deleted_at'            => 'datetime',
        ];
    }
}
