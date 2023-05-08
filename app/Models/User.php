<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $guarded = []; 

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // //this is a function to capitalize the selected attribute
    // public function getUsernameAttribute($username){
    //     return ucwords($username);
    // }

    //this is for the bcrypt password, set follow the attribute name, it could be setNameAttribute, or any field
    public function setPasswordAttribute($password){//will receive the current password
        $this->attributes['password'] = bcrypt($password);
    }

    //this is the inverse relationship from Post - user then grab their post
    public function posts(){ //$user->posts
        return $this->hasMany(Post::class);

    }

}
