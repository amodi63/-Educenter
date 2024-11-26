<?php

namespace App\Models;

use App\Scopes\UserAddedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Course extends Model
{
    use HasFactory,softDeletes;
     protected $guarded = [];
    
    public function teacher()
    {
        return $this->belongsTo(Teacher::class , 'teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'registrations', 'course_id', 'student_id');
    }
   

}

