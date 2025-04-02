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
            $table->mediumInteger('google_id')->nullable()->comment('グーグルID');
            $table->string('name', 50)->comment('名前');
            $table->string('nickname', 50)->nullable()->comment('ニック名前');
            $table->string('email')->unique()->comment('メールアドレス');
            $table->string('password')->nullable()->comment('パスワード');
            $table->string('icon_image')->nullable()->comment('アイコン画像');
            $table->unsignedTinyInteger('prefecture')->comment('都道府県')->nullable()->after('icon_image');
            $table->unsignedTinyInteger('status')->default(UserStatus::ACTIVE)->comment('ステータス');
            $table->datetime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable()->nullable();
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
