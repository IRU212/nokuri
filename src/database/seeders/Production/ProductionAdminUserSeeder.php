<?php

namespace Database\Seeders\Production;

use App\Enum\AdminUserRole;
use App\Models\AdminRole;
use App\Models\AdminUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

final class ProductionAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
                'role' => AdminUserRole::MASTER
            ],
        ];
        AdminUser::upsert($params, ['id'], ['updated_at']);
    }

    private function makePassword($password): string
    {
        return Hash::make($password);
    }
}
