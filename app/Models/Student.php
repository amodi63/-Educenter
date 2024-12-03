<?php

namespace App\Models;

use App\Scopes\UserAddedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Student extends Model
{
    use HasFactory, softDeletes;
    protected $guarded = [];

    


    public function courses()
    {
        return $this->belongsToMany(Course::class, 'registrations', 'student_id', 'course_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
