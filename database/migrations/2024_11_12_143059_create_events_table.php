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
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // bigint ID
            $table->char('uuid', 36); // UUID with a char type
            $table->string('name'); // varchar for the event name
            $table->text('description'); // text for the event description
            $table->string('image'); // varchar for the event image path or URL
            $table->enum('status', ['active', 'inactive']); // enum for event status (active, inactive)
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
