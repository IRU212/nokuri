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
        Schema::create('user_daily_summaries', function (Blueprint $table) {
            $table->id();
            $table->integer('register_count')->comment('登録数');
            $table->string('register_user_ids_json')->comment('登録ユーザID一覧JSON');
            $table->integer('deleted_count')->comment('削除数');
            $table->string('deleted_user_ids_json')->comment('登録ユーザID一覧JSON');
            $table->datetime('created_at')->useCurrent()->comment('作成日時');
            $table->comment('ユーザ毎日集計数');
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
