<?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
    /**
     * Run the migrations.
     */
//    public function up(): void
// {
//     Schema::create('patients', function (Blueprint $table) {
//         $table->id();
//         $table->string('name');
//         $table->string('email')->unique();
//         $table->string('phone');
//         $table->string('address')->nullable();
//         $table->enum('gender', ['Male', 'Female'])->nullable();
//         $table->date('dob')->nullable();
//         $table->string('photo')->nullable();
//         $table->timestamps();
//     });
// }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('patients');
//     }




// };









use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('disease')->nullable();
            $table->date('admit_date')->nullable();
            $table->date('discharge_date')->nullable();
            $table->boolean('is_discharged')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
