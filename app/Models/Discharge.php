<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discharge extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id','discharge_date','reason'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}

