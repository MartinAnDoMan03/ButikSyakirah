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
        Schema::create('sequin', function (Blueprint $table) {
            $table->integer('sequin_id')->primary()->autoIncrement();
            $table->integer('order_detail_id');
            $table->integer('sequiner_id')->nullable();
            $table->enum('sequin_status', ['Belum Selesai', 'Selesai'])->default('Belum Selesai');
            $table->foreign('order_detail_id')->references('order_detail_id')->on('order_details')->onDelete('restrict');
            $table->foreign('sequiner_id')->references('user_id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sequin');
    }
};
