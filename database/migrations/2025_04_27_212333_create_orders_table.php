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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('description');
            $table->unsignedBigInteger('customer_user_id');
            $table->unsignedBigInteger('attendant_user_id')->nullable();
            $table->enum('type', ['PRESENCIAL', 'ONLINE']);
            $table->enum('status', ['PENDENTE', 'PAGO', 'CANCELADO', 'RECEBIDO']);
            $table->decimal('total_price', 10, 2);
            $table->integer('total_quantity');
            $table->decimal('total_discount', 10, 2)->nullable();
            $table->foreign('customer_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('attendant_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
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
