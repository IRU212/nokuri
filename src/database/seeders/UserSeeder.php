<?php

namespace Database\Seeders;

use App\Enum\Prefecture;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'  => 'テスト用アカウント',
            'email' => 'ryuuyapro@gmail.com',
            'password' => Hash::make('password0'),
            'prefecture_id' => Prefecture::AICHI,
        ]);
        User::factory()->count(50)->create();
    }
}
