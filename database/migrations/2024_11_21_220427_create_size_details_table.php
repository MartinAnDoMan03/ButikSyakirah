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
            $table->integer('order_detail_id');
            $table->decimal('chest_circumference', 10, 2);
            $table->decimal('waist_circumference', 10, 2);
            $table->decimal('arm_circumference', 10, 2);
            $table->decimal('arm_length', 10, 2);
            $table->decimal('shoulder_width', 10, 2);
            $table->decimal('hip',10, 2);
            $table->decimal('wrist_circumference',10, 2);
            $table->decimal('shoulder_length',10 ,2);
            $table->foreign('order_detail_id')->references('order_detail_id')->on('order_details')->onDelete('restrict');
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
