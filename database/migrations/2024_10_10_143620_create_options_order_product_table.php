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
        Schema::create('options_order_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('option_group_id')->nullable();
            $table->foreignId('property_id')->nullable();
            $table->foreignId('option_id')->nullable();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('value')->nullable();
            $table->integer('value_int')->nullable();
            $table->string('type')->nullable();
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options_order_product');
    }
};
