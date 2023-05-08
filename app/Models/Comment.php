<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // //this is to set the fillable fields for comments
    // protected $guarded = [];

    //this is for the relationship, post connected to category
    public function post(){
        //hasOne, hasMany, belongsTo, belongsToMany - should learn for relationships
        return $this->belongsTo(Post::class);
    }

    public function author(){
        //hasOne, hasMany, belongsTo, belongsToMany - should learn for relationships
        return $this->belongsTo(User::class, 'user_id');
    }
}
