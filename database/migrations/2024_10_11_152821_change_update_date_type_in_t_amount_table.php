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
        Schema::table('t_amount', function (Blueprint $table) {
            // カラムの型を変更
            $table->timestamp('update_date')->nullable()->change();
    });    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_amount', function (Blueprint $table) {
            // 変更前のカラムの型に戻す
            $table->integer('update_date')->nullable()->change();
        });   
    }
};
