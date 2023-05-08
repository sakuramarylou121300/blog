<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory; 

    //this is for the relationship, post connected to category
    public function posts(){
        //hasOne, hasMany, belongsTo, belongsToMany - should learn for relationships
        //this will be hasMany, there is no field from post that is why it is not belong to Post, instead we shoul use haMany
        return $this->hasMany(Post::class);
    }
}
