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
        Schema::create('prefecture', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prefecture_id')->constrained('prefecture')->comment('都道府県ID');
            $table->string('code', 4)->unique()->comment('コード');
            $table->string('name', 10)->comment('名前');
            $table->string('prefectural_capital', 10)->comment('県庁所在地');
            $table->datetime('created_at')->comment('作成日時');
            $table->dateTime('updated_at')->comment('更新日時');
            $table->dateTime('deleted_at')->nullable()->comment('削除日時');
            $table->comment('都道府県');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prefecture');
    }
};
