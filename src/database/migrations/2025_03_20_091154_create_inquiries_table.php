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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->string('name', 100)->comment('名前');
            $table->string('email', 100)->comment('メールアドレス');
            $table->text('content', 500)->comment('内容');
            $table->foreignId('user_id')->constrained()->nullable()->comment('ユーザID');
            $table->datetime('created_at')->comment('作成日時');
            $table->dateTime('updated_at')->comment('削除日時');
            $table->comment('問い合わせ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
