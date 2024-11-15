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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_item_id'); // Foreign key to food item
            $table->unsignedBigInteger('beneficiary_id')->nullable(); // Foreign key to user (beneficiary)
            $table->string('code')->unique(); // Unique voucher code
            $table->boolean('is_redeemed')->default(false); // Redemption status
             $table->dateTime('expiry_date');
            $table->decimal('amount', 8, 2);
            $table->dateTime('redeemed_at')->nullable(); // When redeemed, if applicable
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('food_item_id')->references('id')->on('food_items')->onDelete('cascade');
            $table->foreign('beneficiary_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
