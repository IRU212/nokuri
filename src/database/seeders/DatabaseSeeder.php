<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Production\ProductionAdminRoleSeeder;
use Database\Seeders\Production\ProductionAdminUserSeeder;
use Database\Seeders\Production\ProductionBannerSeeder;
use Database\Seeders\Production\ProductionNewsSeeder;
use Database\Seeders\Production\ProductionPrefecture;
use Database\Seeders\Production\ProductionWorkOutSeeder;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    private const LOCAL_SEEDER_LIST = [
        ProductionWorkOutSeeder::class,
        ProductionPrefecture::class,
        ProductionNewsSeeder::class,
        ProductionAdminUserSeeder::class,
        ProductionBannerSeeder::class,
        ProductionAdminRoleSeeder::class,
        UserSeeder::class,
    ];

    private const STG_SEEDER_LIST = [
        ProductionWorkOutSeeder::class,
        ProductionPrefecture::class,
        ProductionNewsSeeder::class,
        ProductionAdminUserSeeder::class,
        ProductionBannerSeeder::class,
        ProductionAdminRoleSeeder::class,
        UserSeeder::class,
    ];

    private const PRO_SEEDER_LIST = [
        ProductionWorkOutSeeder::class,
        ProductionPrefecture::class,
        ProductionNewsSeeder::class,
        ProductionAdminUserSeeder::class,
        ProductionBannerSeeder::class,
        ProductionAdminRoleSeeder::class,
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::transaction( function() {
            try {
                // ローカル
                if (App::environment('local')) {
                    $this->call(self::LOCAL_SEEDER_LIST);
                }
                // ステージング
                if (App::environment('staging')) {
                    $this->call(self::STG_SEEDER_LIST);
                }
                // 本番
                if (App::environment('production')) {
                    $this->call(self::PRO_SEEDER_LIST);
                }
            } catch (Exception $e) {
                Log::error("シーダー実行でエラーが起きました");
                Log::error($e);
            }
        });
    }
}
