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

    /**
     * お問い合わせと登録します
     *
     * @param array $save_data
     * @return self
     */
    public function saveInquiry(array $save_data): self
    {
        $this->fill($save_data);
        $this->save();
        return $this;
    }
}
