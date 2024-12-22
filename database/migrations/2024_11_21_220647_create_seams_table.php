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
        Schema::create('seams', function (Blueprint $table) {
            $table->integer('seam_id')->primary()->autoIncrement();
            $table->integer('order_detail_id');
            $table->string('seam_name');
            $table->string('cloth_type');
            $table->integer('seamer_id');
            $table->integer('seam_size');
            $table->enum('seam_status', ['Belum-Selesai', 'Selesai']);
            $table->foreign('order_detail_id')->references('order_detail_id')->on('order_details')->onDelete('restrict');
            $table->foreign('seamer_id')->references('user_id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seams');
    }
};
