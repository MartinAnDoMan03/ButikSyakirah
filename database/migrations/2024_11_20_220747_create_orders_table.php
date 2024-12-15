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

        Schema::create('orders', function (Blueprint $table) {
            $table->integer('order_id')->primary()->autoIncrement();
            $table->integer('customer_id');
            $table->date('order_date');
            $table->date('completion_date')->nullable();
            $table->integer('total_price')->nullable();
            $table->enum('status', ['Diproses', 'Selesai', 'Dibatalkan'])->default('Diproses');
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('restrict');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
