<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Teacher extends Model
{
    use HasFactory,softDeletes;
     protected $guarded = [];

     public function registrations()
    {
        return $this->belongsTo(Registrations::class);
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }

    public function course()
    {
        return $this->hasMany(Course::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id')->withDefault();
    }
}
