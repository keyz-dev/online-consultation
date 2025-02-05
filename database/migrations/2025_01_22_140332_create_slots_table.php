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
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('availability_id')->index();
            $table->foreign('availability_id', 'fk_slot_avail')->references('id')->on('availabilities')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->enum('status', ['expired', 'booked', 'available'])->default('available');
            $table->string('day');
            $table->time('start_time')->default(now()->format('H:i'));
            $table->time('end_time')->default(now()->format('H:i'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slots');
    }
};
