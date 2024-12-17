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
        Schema::create('stock_suppliers', function (Blueprint $table) {
            $table->integer('stock_id');
            $table->integer('supplier_id');
            $table->foreign('stock_id')->references('stock_id')->on('stocks')->onDelete('cascade');
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers')->onDelete('cascade');
            $table->primary(['stock_id', 'supplier_id']);
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks_suppliers');
    }
};
