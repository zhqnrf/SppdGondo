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
        Schema::create('instructions_employees_cadres', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('users')->nullable()->references('id')->on('employee')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('instructions')->references('id')->on('instructions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructions_employees_cadres');
    }
};
