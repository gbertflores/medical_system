<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'last_name', 'first_name', 'middle_name', 'extension_name', 'address', 'contact_number'
    ];
}
