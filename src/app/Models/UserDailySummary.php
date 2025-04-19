<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class UserDailySummary extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'register_count',
        'register_user_ids_json',
        'deleted_count',
        'deleted_user_ids_json',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}