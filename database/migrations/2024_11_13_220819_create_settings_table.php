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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('smtp_user')->nullable();
            $table->string('smtp_host')->nullable();
            $table->string('smtp_password')->nullable();
            $table->string('currency')->default('$');
            $table->string('site_name')->default('Food Stuff Alleviation');
            $table->string('site_short_name')->default('FoodStuff');
            $table->string('site_email')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->default('localhost/');
            $table->text('address')->nullable();
            $table->decimal('charges', 10, 2)->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('welcome_message')->default("Welcome to Food Stuff Alleviation Portal");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
