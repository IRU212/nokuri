<?php

use App\Enum\UserStatus;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('google_id')->unique()->nullable()->comment('グーグルID');
            $table->string('name', 50)->comment('名前');
            $table->string('nickname', 50)->nullable()->comment('ニックネーム');
            $table->string('email')->unique()->comment('メールアドレス');
            $table->string('password')->nullable()->comment('パスワード');
            $table->string('icon_image')->nullable()->comment('アイコン画像');
            $table->unsignedTinyInteger('prefecture')->nullable()->comment('都道府県');
            $table->unsignedTinyInteger('status')->default(UserStatus::ACTIVE)->comment('ステータス');
            $table->datetime('created_at')->comment('作成日時');
            $table->dateTime('updated_at')->comment('更新日時');
            $table->dateTime('deleted_at')->comment('削除日時')->nullable();
            $table->comment('一般ユーザ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
