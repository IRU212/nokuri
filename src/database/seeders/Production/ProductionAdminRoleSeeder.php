<?php

namespace Database\Seeders\Production;

use App\Models\AdminRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductionAdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminRole::create([
            'name' => 'マスタ'
        ]);
        AdminRole::create([
            'name' => '一般'
        ]);
    }
}
