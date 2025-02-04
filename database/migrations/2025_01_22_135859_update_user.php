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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender', ['male', 'female']);
            $table->integer('age')->default(0);
            $table->string('password');
            $table->date('dob');
            $table->string('Nationality')->default('Cameroon');
            $table->string('city')->default('Yaounde');
            $table->enum('role', ['admin', 'doctor', 'patient'])->default('patient');
            $table->string('profile_image')->default('placeholder.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
