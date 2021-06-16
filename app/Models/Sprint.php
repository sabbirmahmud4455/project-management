<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'start_date',
        'end_date',
        'status',
        'duration',
        'purposes',
        'description'
    ];

    public function sprintTask()
    {
        return $this->hasMany(SprintTask::class)->with(['task', 'user']);
    }
}
