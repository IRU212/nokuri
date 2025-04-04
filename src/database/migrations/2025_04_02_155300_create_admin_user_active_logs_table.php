<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->foreignId('admin_user_id')->constrained()->nullable()->comment('管理者ユーザID');
            $table->comment('管理ユーザログ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_user_logs');
    }
};
