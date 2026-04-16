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
        $table->string('name');
        $table->string('qualification');
        $table->string('specialist');
        $table->string('phone');
        $table->string('email')->unique();
        $table->string('address')->nullable();
        $table->integer('experience')->nullable();
        $table->string('duty_timing')->nullable(); // e.g. "9 AM - 5 PM"
        $table->string('availability')->default('Available'); // Available / Not Available
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
