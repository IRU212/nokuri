<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_user_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('type')->comment('タイプ');
            $table->string('description', 255)->comment('説明');
            $table->foreign('admin_user_id')->unique()->references('admin_user_id')->on('admin_users')->nullable()->comment('管理者ユーザID');
        })
        DB::statement("ALTER TABLE admin_user_logs COMMENT = '管理ユーザログ'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_user_logs');
    }
};
