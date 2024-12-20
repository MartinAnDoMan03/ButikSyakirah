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
            $table->integer('sequin_id');
            $table->integer('order_id');
            $table->integer('sequin_price');
            $table->integer('sequiner_id')->nullable();
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('restrict');
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
