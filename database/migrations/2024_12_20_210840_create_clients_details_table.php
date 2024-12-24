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
        Schema::create('clients_details', function (Blueprint $table) {
            $table->id();
            $table->string('gender')->nullable();
            $table->string('martial')->nullable();
            $table->integer('age')->nullable();
            $table->foreignId('post_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients_details');
    }
};
