<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    protected $fillable = [
        'name',
        'nip',
        'no_hp',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}