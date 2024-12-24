<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('num')->nullable();
            $table->foreignId('status_id')->nullable();
            $table->foreignId('client_id')->nullable();
            $table->foreignId('address_id')->nullable();
            $table->decimal('amount')->nullable();
            $table->decimal('discount')->nullable();
            $table->integer('discount_type')->nullable();
            $table->foreignId('payment_id')->nullable();

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
