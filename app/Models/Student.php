<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    protected $fillable = [
        'nis',
        'name',
        'email',
        'password',
        'classroom_id',
    ];
    protected $casts = [
        'password' => 'hashed',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
