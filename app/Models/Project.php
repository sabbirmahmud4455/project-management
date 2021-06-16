<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'name',
        'type',
        'photo',
        'start_date',
        'end_date',
        'status',
        'development_cost',
    ];

    public function modules()
    {
        return $this->hasMany(Module::class)->with(['tasks']);
    }
}
