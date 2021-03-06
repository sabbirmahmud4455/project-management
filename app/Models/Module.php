<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'project_id',
        'title',
        'description',
        'status'
    ];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
    public function tasks()
    {
    	return $this->hasMany(Task::class);
    }
}
