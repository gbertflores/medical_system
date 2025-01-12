<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $fillable = [
        'name',
        'abbreviation'
    ];

    public function programs() {
        return $this->hasMany(Program::class);
    }
}
