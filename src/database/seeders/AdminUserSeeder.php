<?php

namespace Database\Seeders;

use App\Enum\AdminUserRole;
use App\Models\AdminUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_user = new AdminUser();

        $admin_user::factory()->count(10)->create();
        $admin_user->saveAdminUser([
            'name_sei' => '岡嶋',
            'name_mei' => '龍弥',
            'email' => 'ryuuyapro@gmail.com',
            'password' => Hash::make('ryuuya2121b'),
            'role' => AdminUserRole::MASTER,
        ]);
    }
}
