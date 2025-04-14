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
        Schema::create('password_reset_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->nullable()->comment('ユーザID');
            $table->string('email')->comment('メールアドレス');
            $table->string('token')->comment('トークン');
            $table->dateTime('token_deadline_at')->comment('トークン制限日時');
            $table->datetime('created_at')->comment('作成日時');
            $table->dateTime('updated_at')->comment('更新日時');
            $table->comment('パスワードリセットユーザ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_users');
    }
};
