<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Staffpatient extends Model
// {
//     use HasFactory;

//     protected $table = 'staffpatients';
//     protected $fillable = [
//         'patient_name',
//         'department_id',
//         'doctor_id',
//         'room_id',
//         'bed_id',
//         'status',
//     ];

//     // public function department() {
//     //     return $this->belongsTo(Department::class);
//     // }

//     public function doctor() {
//         return $this->belongsTo(Doctor::class);
//     }

//     public function room() {
//         return $this->belongsTo(Room::class);
//     }

//     public function bed() {
//         return $this->belongsTo(Bed::class);
//     }
// }




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffpatient extends Model
{
    use HasFactory;

    protected $table = 'staffpatients';

    protected $fillable = [
        'patient_name', 'mobile', 'department_id', 'doctor_id', 'room_id', 'bed_id', 'status'
    ];

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }

    public function room() {
        return $this->belongsTo(Room::class);
    }

    public function bed() {
        return $this->belongsTo(Bed::class);
    }
}
