<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    //
    public function index(){
        return view('admin.posts.index',[
            'posts'=>Post::paginate(50)
        ]);
    }

     //create post for admin
     public function create(){
        //this is for the authorization for admin
        //if not admin then, connected to middleware MustBeAdministrator
        return view('admin.posts.create');
    }

    //store post for admin
    public function store(){

        Post::create(array_merge($this->validatePost(), [
            'user_id' => request()->user()->id,//to get the user who posts the post
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')//file name thumbnail and be stored in thumbnails directory
        ]));

        return redirect('/');
    }

    //edit post for admin
    //get the post then create a variable
    public function edit(Post $post){
        return view('admin.posts.edit', ['post'=>$post]);
    }
    
    public function update(Post $post){
        
        $attributes = $this->validatePost($post);

        //if there is a request for thumbnail
        if($attributes['thumbnail'] ?? false){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');//file name thumbnail and be stored in thumbnails directory    
        }

        $post->update($attributes);
        return back()->with('success', 'Post Updated');
    }

    //this is for the delete
    public function destroy(Post $post){
        $post->delete();
        return back()->with('success', 'Post Deleted!');
    }

    //this is for validation
    //no need to give a post if you don't want to
    protected function validatePost(?Post $post = null):array{
        //if there is a Post
        //this is just to assist the some especialize validation rules
        $post ??= new Post();
        return request()->validate([
            'title'=>'required',
            'thumbnail'=>$post->exists ? ['image'] : ['required','image'],//if there is an existing photo then the only validation is image, otherwise the required and image is required
            'slug'=>['required', Rule::unique('posts', 'slug')->ignore($post)],//the slug must be unique in the posts table with the slug field, ignore the current post, even have the same value for the slug it will update
            'excerpt'=>'required',
            'body'=>'required',
            'category_id'=>['required', Rule::exists('categories', 'id')],//it should be a valid category id from categories table, exists in categories table, and id column
        ]);
    }
    
}
