<?php

namespace App\Helpers;

use App\Models\Doctor;

class DoctorHelper
{
    /**
     * Get doctor profile by ID
     */
    public static function getProfileById($id)
    {
        return Doctor::find($id);
    }
}
