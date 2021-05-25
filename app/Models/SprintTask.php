<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SprintTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'sprint_id',
        'task_id',
        'priority',
        'type',
        'assigned_to',
        'checked_by',
        'status'
    ];
}
