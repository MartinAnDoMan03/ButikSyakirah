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
        Schema::create('inventory_logs', function (Blueprint $table) {
            $table->integer('transaction_id')->primary();
            $table->integer('stock_id');
            $table->string('reference_type');
            $table->integer('order_reference_id')->nullable();
            $table->integer('supplier_reference_id')->nullable();
            $table->string('transaction_type');
            $table->integer('quantity');
            $table->date('transaction_date');
            $table->foreign('stock_id')->references('stock_id')->on('stocks')->onDelete('restrict');
            $table->foreign('order_reference_id')->references('order_id')->on('orders')->onDelete('restrict');
            $table->foreign('supplier_reference_id')->references('supplier_id')->on('suppliers')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_logs');
    }
};
