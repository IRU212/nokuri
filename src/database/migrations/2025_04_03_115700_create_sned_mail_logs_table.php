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
        Schema::create('sned_mail_logs', function (Blueprint $table) {
            $table->id();
            $table->string('from_email')->comment('送信元メールアドレス');
            $table->string('to_email')->comment('送信先メールアドレス');
            $table->string('subject')->comment('メールの件名');
            $table->string('body')->comment('本文');
            $table->unsignedTinyInteger('status')->comment('メール送信ステータス');
            $table->string('error_message')->comment('メール送信失敗時のメッセージ');
            $table->dateTime('send_time_at')->comment('メール送信日時');
            $table->dateTime('created_at')->comment('作成日時');
            $table->comment('送信メールログ');
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
