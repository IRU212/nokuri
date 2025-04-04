<?php

namespace Database\Seeders;

use Database\Seeders\Production\ProductionAdminUserSeeder;
use Database\Seeders\Production\ProductionNewsSeeder;
use Database\Seeders\Production\ProductionWorkOutSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $seeder_call_list = [];

        // 共通データ
        $seeder_call_list[] = ProductionWorkOutSeeder::class;
        $seeder_call_list[] = ProductionNewsSeeder::class;
        $seeder_call_list[] = ProductionAdminUserSeeder::class;

        if (App::environment('local')) {
            //
        }
        if (App::environment('staging')) {
            //
        }
        if (App::environment('producton')) {
            //
        }

        $this->call($seeder_call_list);
    }
}
