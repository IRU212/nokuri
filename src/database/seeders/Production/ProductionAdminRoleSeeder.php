<?php

namespace Database\Seeders\Production;

use App\Models\AdminRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ProductionAdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        AdminRole::create(['name' => 'マスタ', 'code' => '01']);
        AdminRole::create(['name' => '一般', 'code' => '02']);
    }
}
