<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_descriptions extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'document_path',
        'documentation',
        'description'
    ];
}
