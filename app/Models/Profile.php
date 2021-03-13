<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'skills',
        'date_of_birth',
        'nid',
        'present_address',
        'permanent_address',
        'emergency_contact_person',
    ];
    
}
