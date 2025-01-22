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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipient_id');
            $table->foreign('recipient_id', 'fk_notif_recipient')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->enum('type', ['email', 'sms', 'push'])->default('email');
            $table->enum('status', ['sent','unread', 'read', 'none'])->default('none');
            $table->string('title');
            $table->text('content')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
