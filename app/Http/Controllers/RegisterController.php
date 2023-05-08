<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function create(){
        return view('registered.create');
    }

    public function store(){
        //create the user
        //protecting request
        // if you did not satisfy the validation then laravel will automatically redirect you the form
        // unique the users table, column username
        $attributes = request()->validate([
            'name'=>'required|max:255',
            'username'=>'required|min:3|max:255|unique:users,username',
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>'required|min:7'
        ]);

        $user = User::create($attributes);

        //log in the user
        auth()->login($user);

        //redirect to the home page with the flash success method, the Your account has been created is dynamic in layout and flash.blade.php
        return redirect('/')->with('sucess', 'Your account has been created.');
    }
}
