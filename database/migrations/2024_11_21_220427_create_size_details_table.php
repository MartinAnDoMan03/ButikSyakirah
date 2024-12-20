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
            $table->integer('size_detail_id')->primary()->autoIncrement();
            $table->integer('order_id');
            $table->integer('chest_circumference');
            $table->integer('waist_circumference');
            $table->integer('arm_circumference');
            $table->integer('arm_length');
            $table->integer('shoulder_width');
            $table->integer('hip');
            $table->integer('wrist_circumference');
            $table->integer('shoulder_length');
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('restrict');
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
