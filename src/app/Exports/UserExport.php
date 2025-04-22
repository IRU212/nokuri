<?php

namespace App\Exports;

use App\Enum\UserStatus;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

final class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $result = User::query()
            ->select(['id', 'name', 'nickname', 'email', 'prefecture_id', 'status'])
            ->orderBy('id')
            ->get()
            ->map(function ($user) {
                $user->status = UserStatus::from($user->status)->label();
                return $user;
            });
        return $result;
    }

    public function headings(): array
    {
        return [
            'ID',
            '名前',
            'ニックネーム',
            'メールアドレス',
            '都道府県',
            'ステータス',
        ];
    }
}
