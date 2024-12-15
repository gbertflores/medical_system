<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
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
}
