<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostCommentController extends Controller
{
    //there is the Post because in the web, we first look for Post and then the comment will be reference to the Post
    public function store(Post $post){
        //validation
        request()->validate([
            'body'=> 'required'
        ]);

        //add a comment to the given post
        $post->comments()->create([
            'user_id'=> request()->user()->id,//to get the id of the current user posting comments 
            'body'=>request('body')
        ]);

        //after saving redirect back to the previous page
        return back();
    }
}
