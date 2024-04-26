<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('instructions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('activity_name');
            $table->string('sub_activity_name');
            $table->foreignUuid('category_id')->references('id')->on('category')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamp('departure_date')->default(DB::raw("CURRENT_TIMESTAMP"));
            $table->timestamp('return_date')->default(DB::raw("CURRENT_TIMESTAMP"));
            $table->foreignUuid('transportation_id')->references('id')->on('transportation')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('destination_to_id')->references('id')->on('destination')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('destination_from_id')->references('id')->on('destination')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('travel_time')->default(0);
            $table->foreignUuid('budget_account_id')->references('id')->on('account')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('bank_account_id')->references('id')->on('bank_account')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('present_in');
            $table->string('accept_from');
            $table->string('sub_component');
            $table->string('amount_money');
            $table->string('briefings');
            $table->string('problem');
            $table->string('advice');
            $table->string('other');
            $table->string('description');
            $table->foreignUuid('treasurer_id')->references('id')->on('employee')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructions');
    }
};
