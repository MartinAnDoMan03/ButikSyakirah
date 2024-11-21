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
            $table->id();
            $table->integer('order_id');
            $table->string('seam_name');
            $table->string('cloth_type');
            $table->integer('seam_size');
            $table->integer('seam_price');
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
