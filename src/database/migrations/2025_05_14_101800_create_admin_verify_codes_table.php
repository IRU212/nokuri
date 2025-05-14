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
        Schema::create('admin_verify_codes', function (Blueprint $table) {
            $table->id();
            $table->string('email')->comment('メールアドレス');
            $table->string('code')->comment('コード');
            $table->string('token')->comment('トークン');
            $table->dateTime('token_deadline_at')->comment('トークン制限日時');
            $table->datetime('created_at')->comment('作成日時');
            $table->dateTime('updated_at')->comment('更新日時');
            $table->comment('管理者コード');
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
