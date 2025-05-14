<?php

namespace Database\Seeders\Production;

use App\Models\AdminRole;
use App\Models\AdminUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

final class ProductionAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $admin_role = new AdminRole();
        $admin_role_master_id  = $admin_role->query()->firstWhere('code', '01')->id;
        $admin_role_general_id = $admin_role->query()->firstWhere('code', '02')->id;

        $params = [
            [
                'id' => 1, 
                'name' => '岡嶋 龍弥', 
                'name_sei' => '岡嶋', 
                'name_mei' => '龍弥', 
                'email' => 'ryuuyapro@gmail.com', 
                'password' => $this->makePassword('ryuuya2121b'), 
                'role' => $admin_role_master_id,
            ],
            [
                'id' => 2, 
                'name' => '山田 太郎', 
                'name_sei' => '山田', 
                'name_mei' => '太郎', 
                'email' => 'yamadatarou01@gmail.com', 
                'password' => $this->makePassword('password0'), 
                'role' => $admin_role_general_id,
            ],
        ];
        AdminUser::upsert($params, ['id'], ['updated_at']);
    }

    private function makePassword($password): string
    {
        return Hash::make($password);
    }
}
