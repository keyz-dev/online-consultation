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
        Schema::create('user_contacts', function (Blueprint $table) {
            $table->foreignId('user_id')->index();
            $table->foreign('user_id', 'fk_contact_user')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('contact_id')->index();
            $table->foreign('contact_id', 'fk_contact_doc')->references('id')->on('contact_information')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('value');
            $table->primary(['contact_id', 'value']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_contacts');
    }
};
