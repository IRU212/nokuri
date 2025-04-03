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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->string('name', 100)->comment('名前');
            $table->string('email', 100)->comment('メールアドレス');
            $table->text('content', 500)->comment('内容');
            $table->foreign('user_id')->references('user_id')->on('users')->nullable()->comment('ユーザID');
            $table->datetime('created_at');
            $table->dateTime('updated_at');
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
