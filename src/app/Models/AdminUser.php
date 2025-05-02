<?php

namespace App\Models;

use App\Models\Traits\DisplayScope;
use App\Observers\AdminUserObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([AdminUserObserver::class])]
final class AdminUser extends Model
{
    use HasFactory, DisplayScope;

    /**
     * 複数代入可能な属性
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'name_sei',
        'name_mei',
        'email',
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * 管理者を保存します
     *
     * @param array $save_data
     * @return self
     */
    public function saveAdminUser(array $save_data): self
    {
        $this->fill($save_data);
        $this->save();
        return $this;
    }
}
