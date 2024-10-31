<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Role extends Model
{
    use HasFactory,softDeletes;
     protected $guarded = [];

     public function abilities()
    {
        return $this->belongsToMany(Ability::class , 'ability_role','role_id','ability_id');
    }
}
