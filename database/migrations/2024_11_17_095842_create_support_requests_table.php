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
        Schema::create('support_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id'); // ID of the sender (user or manager)
            $table->unsignedBigInteger('receiver_id')->nullable(); // ID of the admin responding (optional for reply)
            $table->string('subject');
            $table->text('message');
            $table->enum('status', ['open', 'in-progress', 'resolved', 'closed'])->default('open');
            $table->boolean('is_reply')->default(false); // Indicates if it's a reply
            $table->timestamps();

            // Foreign keys
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receiver_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_requests');
    }
};
