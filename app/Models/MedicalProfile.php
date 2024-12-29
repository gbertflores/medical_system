<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalProfile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'profile_id', 'birthdate', 'sex', 'blood_type', 'allergies', 'medical_history'
    ];

    public function emergency_contact(){
        return $this->hasOne(EmergencyContact::class);
    }
}
