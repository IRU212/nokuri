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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('image')->comment('画像');
            $table->unsignedTinyInteger('sort')->comment('並び順');
            $table->datetime('created_at')->comment('作成日時');
            $table->dateTime('updated_at')->comment('更新日時');
            $table->comment('バナー');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
