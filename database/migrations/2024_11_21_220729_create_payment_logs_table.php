<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//Changed

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_logs', function (Blueprint $table) {
            $table->integer('payment_id')->primary()->autoIncrement();
            $table->integer('order_id');
            $table->integer('payment_amount');
            $table->date('payment_date')->default(DB::raw('CURRENT_DATE'));
            $table->enum('payment_method', ['Cash', 'Bank Transfer']);
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_logs');
    }
};
