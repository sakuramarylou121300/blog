<?php

use App\http\Controllers\AdminPostController;
use App\http\Controllers\PostController;
use App\http\Controllers\PostCommentController;
use App\http\Controllers\RegisterController;
use App\http\Controllers\SessionsController;
use App\http\Controllers\NewsletterController;
use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;
use App\Models\Category;
use App\Models\Post;    
use App\Models\User; 
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/ 


// this is the home page  
//get all post from Post Controller and then the name of the function is index
Route::get('/', [PostController::class, 'index'])->name('home');

//this is another view, the value inside [] is called second argument
//get all according to slug or if you want the id
Route::get('posts/{post:slug}', [PostController::class, 'show']);
// this is for the comments, meaning to add a comment in a specific post:slug
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

//this is for the mailchimp api, inject Newsletter, automatic resolution
Route::post('newsletter', NewsletterController::class);

//this is for create account, if already signed in then it should not allow the user to create an account, that function is the role of middleware
Route::get('register', [RegisterController:: class, 'create'])->middleware('guest');//get the page first
Route::post('register', [RegisterController:: class, 'store'])->middleware('guest');

//this is for the logout, sessinController controls the session of the site
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');//in order to log in you have to log out
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
//in order to log out you have to be logged in, you need auth to log out
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');//in order to log out you have to be logged in

//group authorization
//for admin delete and update, can:admin is the ability name in the appservice provider
Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts',AdminPostController::class)->except('show');
    
});



