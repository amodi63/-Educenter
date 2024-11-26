<?php

namespace App\Models;

use App\Scopes\UserAddedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Teacher extends Model
{
    use HasFactory,softDeletes;
     protected $guarded = [];

     

     public function registrations()
    {
        return $this->belongsTo(Registration::class);
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
