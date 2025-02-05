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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->index();
            $table->foreign('doctor_id', 'fk_doc_appointment')->references('id')->on('doctors')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('patient_id')->index();
            $table->foreign('patient_id', 'fk_patient_appoint')->references('id')->on('patients')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('slot_id')->index()->nullable();
            $table->foreign('slot_id', 'fk_slot_appoint')->references('id')->on('slots')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->enum('status', ['completed', 'cancelled', 'pending'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
