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
        'assign_to',
        'checked_by',
        'status'
    ];
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'assign_to', 'id');
    }
}
