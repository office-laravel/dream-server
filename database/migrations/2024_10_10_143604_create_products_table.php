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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->text('desc')->nullable();
            $table->string('slug')->nullable();
            $table->decimal('cost')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('discount')->nullable();
            $table->integer('discount_type')->nullable();
            $table->string('code')->nullable();
            $table->string('sku')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('instock')->nullable();
            $table->decimal('rate')->nullable();
            $table->integer('is_new')->nullable();
            $table->integer('is_special')->nullable();
            $table->integer('hide_price')->nullable();
            $table->integer('is_new_enddate')->nullable();
            $table->integer('is_special_enddate')->nullable();
            $table->integer('sequence')->nullable();
            $table->integer('is_active')->nullable();
            $table->text('keywords')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
