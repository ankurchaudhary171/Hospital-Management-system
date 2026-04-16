<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('doctor_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('qualification');
            $table->string('specialist');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('address')->nullable();
            $table->integer('experience')->nullable();
            $table->string('duty_timing')->nullable();
            $table->string('availability')->default('Available');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctor_profiles');
    }
};
