<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'subject_id',
         'teacher_id', 
         'title', 
         'duration', 
         'start_time',
          'end_time', 
          'is_active'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    


}
