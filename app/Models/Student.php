<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
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
