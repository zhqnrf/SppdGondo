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
        Schema::create('head_of_the_health_center', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('name');
            $table->text('nip');
            $table->text('rank');
            $table->text('group');
            $table->bigInteger('daily_money')->default(0);
            $table->bigInteger('transport_money')->default(0);
            $table->bigInteger('food_money')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('head_of_the_health_center');
    }
};
