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
        Schema::create('destination', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('type_destination_id')->references('id')->on('type_destination')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('places_id')->references('id')->on('places')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('type', ['to', 'from']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destination');
    }
};
