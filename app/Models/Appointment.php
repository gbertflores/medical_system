<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'appointment_number',
        'appointment_date',
        'appointment_schedule',
        'school_year',
        'semester',
        'status',
        'remarks',
        'purpose'
    ];

    public function studentInformation()
    {
        return $this->hasOneThrough(StudentInformation::class, User::class, 'id', 'user_id', 'user_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
