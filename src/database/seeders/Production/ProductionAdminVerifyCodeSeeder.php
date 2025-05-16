<?php

namespace Database\Seeders\Production;

use App\Enum\TokenByteLength;
use App\Models\AdminVerifyCode;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

final class ProductionAdminVerifyCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        foreach (config('admin.ignore_login_code') as $email) {
            AdminVerifyCode::create([
                'email'             => $email,
                'code'              => '123456',
                'token'             => TokenByteLength::ADMIN_LOGIN->generateToken(),    
                'token_deadline_at' => new Carbon('2026-01-01 00:00:00'),
            ]);
        }
    }
}
