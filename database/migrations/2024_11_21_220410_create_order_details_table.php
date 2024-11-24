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
        Schema::create('order_details', function (Blueprint $table) {
            $table->integer('order_detail_id')->primary();
            $table->integer('order_id');
            $table->integer('customer_cloth');
            $table->integer('shop_cloth');
            $table->string('sequin');
            $table->integer('price');
            $table->integer('stock');
            $table->timestamps();
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
