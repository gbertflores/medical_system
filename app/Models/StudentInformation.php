<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentInformation extends Model
{
    protected $fillable = [
        'user_id', 'campus_id', 'college', 'course', 'major', 'year_level', 'status', 'zppsu_number'
    ];
}
