<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    //this has invoke because the controller in the web is not declared as array
    public function __invoke(Newsletter $newsletter)
    {
        // ddd($newsletter);
        //validation
        request()->validate(['email'=>'required|email']);

        try{
            // call the subscribed method from App\Services\Newsletter
            $newsletter->subscribed(request('email'));
        
        }catch(\Exception $e){
            throw ValidationException::withMessages([
                'email'=>'This email could not be added to our newsletter list.'
            ]);
        }
        return redirect('/')->with('success', 'You are now signed up for our newsletter!');
        
        // $response = $mailchimp->ping->get();
    }
}
