<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Course extends Model
{
    use HasFactory,softDeletes;
     protected $guarded = [];

     public function registrations()
    {
        return $this->belongsTo(Registrations::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class , 'teacher_id');
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }
}

