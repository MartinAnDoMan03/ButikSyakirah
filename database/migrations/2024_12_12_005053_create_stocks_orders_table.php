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
        Schema::create('stocks_orders', function (Blueprint $table) {
            $table->integer('stock_id');
            $table->integer('order_id');
            $table->foreign('stock_id')->references('stock_id')->on('stocks')->onDelete('restrict');
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('restrict');
            $table->primary(['stock_id', 'order_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks_orders');
    }
};
