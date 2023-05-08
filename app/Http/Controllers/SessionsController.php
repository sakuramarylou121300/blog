<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;//this is for the log in of the user
// use Dotenv\Exception\ValidationException;//this is the original

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //this is log in form
    public function create(){
        return view('sessions.create');
    }

    //this is the log in action
    public function store(){
        //validate the request
        $attributes = request()->validate([
            'email'=>'required',//check first if the email is existing in the database
            'password'=>'required'

        ]);

        //attempt to authenticate and log in the user, based on the provided credentials
        // this is if the authentication is successful
        if(!auth()->attempt($attributes)){
            //if the authentication is failed
            throw ValidationException::withMessages([
                'email'=>'Your providedc credentials could not be verified.'
            ]);
        }
        
        //redirect with a success flash message
        session()->regenerate();//this is for advance log in
        return redirect('/')->with('success', 'Welcome Back!');
    }

    //this is for the logout
    public function destroy(){
        // check first if the user is signed in, if signed in then they can log out
        auth()->logout();

        return redirect('/')->with('sucess', 'Goodbye!');
    }
}
