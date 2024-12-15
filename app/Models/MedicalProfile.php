<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalProfile extends Model
{
    protected $fillable = [
        'profile_id', 'birthdate', 'gender', 'blood_type', 'allergies', 'medical_history'
    ];
}
