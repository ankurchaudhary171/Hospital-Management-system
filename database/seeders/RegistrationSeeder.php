<?php

namespace Database\Seeders;
use App\Models\Register;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Register::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password'=>Hash::Make('admin123'),
            'mobile'=>'88888888',
            'role'=>'1',
            'image'=>'jpg'
        ]);

           Register::create([
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'password'=>Hash::Make('staff123'),
            'mobile'=>'88888888',
            'role'=>'0',
            'image'=>'jpg'
        ]);

          Register::create([
            'name' => 'doctor',
            'email' => 'doctor@gmail.com',
            'password'=>Hash::Make('doctor123'),
            'mobile'=>'88888888',
            'role'=>'3',
            'image'=>'jpg'
        ]);
    }
}



