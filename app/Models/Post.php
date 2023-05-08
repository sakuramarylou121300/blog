<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;//to have an access to factory

    // protected $guarded = [];
    // protected $guarded = ['id'];//everything is fillable except the id
    // protected $fillable = ['title', 'excerpt', 'body', 'id'];// in contrast with fillable

    //everytime I load the Post I want to author model included as part of the result set, to save fetching of queriess
    protected $with = ['category', 'author'];

    //this is own function for search, to run in Post Controller, the query is passed by laravel builder
    public function scopeFilter($query, array $filters){//Post::newQuery()->filter, no need to if request search, that is not cleaner
        //this is for the search button
        //when there is a search filter then, this is an arrow function
        $query->when($filters['search'] ?? false, fn($query, $search)=>
            
            $query->where(fn($query)=>
                $query->where('title', 'like', '%' . $search . '%')
                ->OrWhere('body', 'like', '%' . $search . '%')
            )
        );//get where like, even not exact as long as they have similar word
        
        //this is for the category
        //the $query, $category, the category here is the category searched by the user
        $query->when($filters['category'] ?? false, fn($query, $category)=>
            //this is with relationship, whereHas category is connected to the category relationship function here
            //select post where has from category table slug
            $query->whereHas('category', fn($query)=>
                $query->where('slug', $category)));
        //this is for the author
        $query->when($filters['author'] ?? false, fn($query, $author)=>
        //this is with relationship, whereHas category is connected to the category relationship function here
        //select post where has from category table slug
        $query->whereHas('author', fn($query)=>
            $query->where('username', $author)));//username is the params
    }

    //this is for the relationship, post has many comments
    public function comments(){
        //hasOne, hasMany, belongsTo, belongsToMany - should learn for relationships
        return $this->hasMany(Comment::class);
    }
    
    //this is for the relationship, post connected to category
    public function category(){
        //hasOne, hasMany, belongsTo, belongsToMany - should learn for relationships
        return $this->belongsTo(Category::class);
    }

    //relationship connected to user, post belongs to one user
    public function author(){//user_id, this should match the field in the table
        //hasOne, hasMany, belongsTo, belongsToMany - should learn for relationships
        return $this->belongsTo(User::class, 'user_id');//this is to even the used variable is not match to user_id, atleast call here the original
    }
}
