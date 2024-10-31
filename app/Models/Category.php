<?php

namespace App\Models;

//use App\Traits\Trans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
//use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    use HasFactory,softDeletes;
     //protected $guarded = [];
     protected $fillable = ['name_major', 'image','title','description'];

     public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id')->withDefault();
   }

    public function children()
   {
       return $this->hasMany(Category::class, 'parent_id');
    }

    // public function teacher()
    // {
    //    return $this->belongsTo(Teacher::class);
    // }
}
