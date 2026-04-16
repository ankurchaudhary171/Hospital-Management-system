<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('staffpatients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('mobile');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('bed_id');
            $table->enum('status', ['Admitted', 'Discharged'])->default('Admitted');
            $table->timestamps();

           
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('staffpatients');
    }
};
