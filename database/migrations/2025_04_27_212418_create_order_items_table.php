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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dish_id')->nullable();
            $table->unsignedBigInteger('drink_id')->nullable();
            $table->unsignedBigInteger('order_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->foreign('dish_id')->references('id')->on('dishes')->onDelete('set null');
            $table->foreign('drink_id')->references('id')->on('drinks')->onDelete('set null');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
