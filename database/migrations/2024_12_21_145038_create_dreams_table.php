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
        Schema::create('dreams', function (Blueprint $table) {
            $table->id();
     
            $table->text('title')->nullable();
            $table->text('content')->nullable();
            $table->text('question')->nullable();
            $table->integer('status')->nullable();
            $table->text('notes')->nullable();
            $table->text('slug')->nullable();
            $table->string('gender')->nullable();
            $table->string('martial')->nullable();
            $table->integer('age')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dreams');
    }
};
