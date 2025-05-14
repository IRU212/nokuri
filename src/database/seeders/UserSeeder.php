<?php

namespace Database\Seeders;

use App\Models\Prefecture;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        User::create([
            'name'  => 'テスト用アカウント',
            'email' => 'ryuuyapro@gmail.com',
            'password' => Hash::make('password0'),
            'prefecture_id' => rand(Prefecture::min('id'), Prefecture::max('id')),
        ]);
        User::factory()->count(50)->create();
    }
}
