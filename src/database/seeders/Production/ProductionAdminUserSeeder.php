<?php

namespace Database\Seeders\Production;

use App\Models\AdminUser;
use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

final class ProductionAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = [
            ['id' => 1, 'name' => '岡嶋 龍弥', 'name_sei' => '岡嶋', 'name_sei' => '龍弥', 'email' => 'ryuuyapro@gmail.com', 'password' => $this->makePassword('ryuuya2121b')],
        ];
        AdminUser::upsert($params, ['id'], ['updated_at']);
    }

    private function makePassword($password): string
    {
        return Hash::make($password);
    }
}
