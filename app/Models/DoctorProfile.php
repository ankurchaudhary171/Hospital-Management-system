<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorProfile extends Model
{
    use HasFactory;

    protected $table = 'doctor_profiles'; // custom table name

    protected $fillable = [
        'name',
        'qualification',
        'specialist',
        'phone',
        'email',
        'address',
        'experience',
        'duty_timing',
        'availability',
    ];
}
