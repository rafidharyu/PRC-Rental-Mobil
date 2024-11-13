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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->char('uuid');
            $table->foreignId('car_id')->constrained('cars')->onDelete('cascade');;
            $table->string('code');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('pick');
            $table->date('drop');
            $table->enum('pick_option', ['garasi', 'tempat_lain']);
            $table->enum('drop_option', ['garasi', 'tempat_lain']);
            $table->enum('drive_option', ['menyetir_sendiri', 'dikemudikan_oleh_sopir']);
            $table->integer('price_total');
            $table->string('file')->nullable();
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
