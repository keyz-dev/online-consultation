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
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->index();
            $table->foreign('doctor_id', 'fk_doc_avail')->references('id')->on('doctors')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->enum('status', ['active', 'expired'])->default('active');
            $table->integer('week_number')->default(date('W'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availabilities');
    }
};
