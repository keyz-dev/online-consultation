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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->foreign('user_id', 'fk_doc_user')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('specialty_id')->index();
            $table->foreign('specialty_id', 'fk_doc_specialty')->references('id')->on('specialties')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('payment_id')->index();
            $table->foreign('payment_id', 'fk_doc_payment')->references('id')->on('payments')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->decimal('consultation_fee', 10, 2)->default(0);
            $table->integer('experience')->default(0);
            $table->integer('rating')->default(0);
            $table->string('license_number')->unique();
            $table->string('hospital');
            $table->text('descriptions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
