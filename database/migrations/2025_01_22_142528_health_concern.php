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
        Schema::create('health_concerns', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('icon_url')->default('default_icon.png');
            $table->foreignId('specialty_id');
            $table->foreign('specialty_id', 'fk_concern_specialty')->references('id')->on('specialties')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_concerns');
    }
};
