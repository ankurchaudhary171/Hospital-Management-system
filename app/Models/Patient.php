<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','email','phone','disease','admit_date','discharge_date','is_discharged'
    ];

    // Agar ek patient ki multiple discharge history chahiye to hasMany
    public function discharges()
    {
        return $this->hasMany(Discharge::class);
    }
}
