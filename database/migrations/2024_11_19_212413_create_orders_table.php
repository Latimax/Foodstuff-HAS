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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_number')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->date('order_date');
            $table->foreignId('food_item_id')->constrained()->onDelete('cascade');
            $table->foreignId('voucher_id')->nullable()->constrained()->onDelete('set null');
            $table->decimal('amount_paid', 10, 2);
            $table->enum('status', ['pending', 'approved', 'cancelled', 'completed'])->default('pending');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
