<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'college_id',
        'name',
        'abbreviation',
        'description',
        'duration_years'
    ];

    public function college() {
        return $this->belongsTo(College::class);
    }
}
