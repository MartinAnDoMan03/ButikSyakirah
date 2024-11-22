<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//changed

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('size_details', function (Blueprint $table) {
            $table->integer('size_detail_id')->primary();
            $table->integer('order_id');
            $table->integer('waist_circumference');
            $table->integer('arm_circumference');
            $table->integer('body_height');
            $table->integer('shoulder_width');
            $table->integer('chest_circumference');
            $table->integer('arm_length');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('size_details');
    }
};
