<?php

namespace App\Http\Controllers;

//these are the imports
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //get all, with search controller for index page
    public function index(){

        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(3)->withQueryString(),//the filter  is from elonquet model, this is to get all posts with foreign key category, 
           
        ]);
    }

    //view one, controller for showing a post
    public function show(Post $post){//have an access to Post model and then create a variable for it
        return view('posts.show', [
            'post' => $post
        ]);
    }

    //create post for admin
    public function create(){
        //this is for the authorization for admin
        //if not admin then, connected to middleware MustBeAdministrator
        return view('admin.posts.create');
    }

    public function store(){

        // file name thumbnail and directory thumbnails
        // $path = request()->file('thumbnail')->store('thumbnails');
        // return 'Done: ' . $path;
        // //validate slug
        // // Str::slug

        // validate the request first
        // ddd(request()->all());
        $attributes = request()->validate([
            'title'=>'required',
            'thumbnail'=>'required|image',
            'slug'=>['required', Rule::unique('posts', 'slug')],//the slug must be unique in the posts table with the slug field
            'excerpt'=>'required',
            'body'=>'required',
            'category_id'=>['required', Rule::exists('categories', 'id')]//it should be a valid category id from categories table, exists in categories table, and id column
        ]);

        //to get the user who posts the post
        $attributes['user_id']= auth()->id();
        //to update the thumbnail path
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');//file name thumbnail and be stored in thumbnails directory

        //to associate the user 
        Post::create($attributes);  

        //after creating the post then redirect to home page
        return redirect('/');
    }


}
