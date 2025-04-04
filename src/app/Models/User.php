<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

final class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'icon_image',
        'google_id',
        'prefecture'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'google_id'
    ];

    /**
     * ユーザを新規登録します
     *
     * @param array $save_data
     * @return self
     */
    public function saveUser(array $save_data): self
    {
        $this->fill($save_data);
        $this->save();
        return $this;
    }
}
