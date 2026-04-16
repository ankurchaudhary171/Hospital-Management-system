<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';

    protected $fillable = [
        'name',
        // 'staff_id',
        'email',
        'password',
        'mobile',
        'department',
        'post',
        'qualification',
        // 'cabin_location',
        'experience',
        'image',
    ];
}
