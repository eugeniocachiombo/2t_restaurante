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
        Schema::create('stock_enters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('drink_id')->nullable();
            $table->unsignedBigInteger('dish_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->date('expiration_date')->nullable();
            $table->foreign('drink_id')->references('id')->on('drinks')->onDelete('cascade');
            $table->foreign('dish_id')->references('id')->on('dishes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_enters');
    }
};
