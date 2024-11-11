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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->char('uuid');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->integer('price_day');
            $table->integer('seat');
            $table->enum('fuel', ['bensin', 'diesel']);
            $table->enum('transmisi', ['manual', 'automatic']);
            $table->integer('year_of_car');
            $table->string('image');
            $table->enum('status', ['available', 'not_available'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
