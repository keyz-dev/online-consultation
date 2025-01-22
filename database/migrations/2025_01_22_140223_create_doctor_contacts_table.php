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
        Schema::create('doctor_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->index();
            $table->foreign('doctor_id', 'fk_contact_doctor')->references('id')->on('doctors')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('contact_id')->index();
            $table->foreign('contact_id', 'fk_contact_doc')->references('id')->on('contact_information')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('value',)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_contacts');
    }
};
