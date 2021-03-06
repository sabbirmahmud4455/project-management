<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'contact_no',
        'type',
        'type_id',
        'gender',
        'status',
        'photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function types()
    {
        return $this->hasMany(UserType::class);
    }
    public function roles()
    {
        return $this->hasMany(UserRole::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function sprintTasks()
    {
        return $this->hasMany(SprintTask::class, 'assign_to', 'id');
    }
    public function activeSprintTasks()
    {
        return $this->hasMany(SprintTask::class, 'assign_to', 'id')->where('status', '!=', 'Closed')->with('task');
    }
    public function closedSprintTasks()
    {
        return $this->hasMany(SprintTask::class, 'assign_to', 'id')->where('status', '=', 'Closed')->with('task');
    }
    public function tasks()
    {
        return $this->belongsToMany(Task::class, SprintTask::class, 'assign_to');
    }
}
