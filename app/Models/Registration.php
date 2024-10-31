<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Registration extends Model
{
    use HasFactory,softDeletes;
     protected $guarded = [];

     public function student()
    {
        return $this->hasMany(Student::class);
    }

    public function teacher()
    {
        return $this->hasMany(Teacher::class);
    }

    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
