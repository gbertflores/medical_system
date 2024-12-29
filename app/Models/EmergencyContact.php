<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    /** @use HasFactory<\Database\Factories\EmergencyContactFactory> */
    use HasFactory;

    protected $fillable = [
        'emergency_contact_name',
        'emergency_contact_number',
        'emergency_contact_relationship',
    ];
}
