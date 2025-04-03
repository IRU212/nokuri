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
        Schema::create('associate_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->nullable()->comment('ユーザID');
            $table->foreignId('admin_user_id')->constrained()->nullable()->comment('管理者ユーザID');
            $table->comment('連携ユーザ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('associate_users');
    }
};
