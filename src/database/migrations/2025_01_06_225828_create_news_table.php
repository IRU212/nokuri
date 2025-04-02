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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->comment('タイトル');
            $table->text('body')->comment('本文');
            $table->unsignedTinyInteger('type')->comment('タイプ');
            $table->datetime('created_at');
            $table->dateTime('updated_at');
        });
        DB::statement("ALTER TABLE news COMMENT = 'お知らせ'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
