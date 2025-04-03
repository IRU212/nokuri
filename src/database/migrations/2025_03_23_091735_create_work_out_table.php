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
        Schema::create('work_outs', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->string('name', 100)->comment('種目名');
            $table->unsignedTinyInteger('is_exercise_equipment')->default(0)->comment('運動器具');
            $table->unsignedTinyInteger('is_bodyweight')->default(0)->comment('自重');
            $table->datetime('created_at')->comment('作成日時');
            $table->dateTime('updated_at')->comment('更新日時');
            $table->dateTime('deleted_at')->nullable()->comment('削除日時');
            $table->comment('筋トレメニュー');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_out');
    }
};
