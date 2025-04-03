<?php

use App\Enum\AdminUserStatus;
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
        Schema::create('admin_users', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->string('name', 50)->comment('名前');
            $table->string('name_mei', 50)->comment('名前 性');
            $table->string('name_sei', 50)->comment('名前 名');
            $table->string('email')->unique()->comment('メールアドレス');
            $table->string('password')->comment('パスワード');
            $table->unsignedTinyInteger('role')->comment('権限');
            $table->unsignedTinyInteger('status')->default(AdminUserStatus::ACTIVE)->comment('ステータス');
            $table->datetime('created_at');
            $table->dateTime('updated_at');
            $table->dateTime('deleted_at')->nullable();
            $table->comment('管理者ユーザ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_users');
    }
};
