<?php

namespace App\Providers;

use App\Services\Newsletter;
use App\Services\MailchimpNewsletter;//for the public function register
use Illuminate\Database\Eloquent\Model;//this is for the fillable
// use Illuminate\Pagination\Paginator;//this is for the pagination
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //this is for the Newsletter services, foobar is the key or identifier, this is also connected to Newsletter controller
       app()->bind(Newsletter::class, function(){
            //this is the protected function client in Newsletter Services
            // $client = new ApiClient();

            $client=(new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us21'
            ]);

            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //when the page boot, then set fillable
        Model::unguard();
        //allow people in and disallows others
        // determine if the currently signed in user
        Gate::define('admin', function(User $user){
            return $user->username === 'meriluako';
        });

        Blade::if('admin', function(){
            //either it is log in or not, this will work, otherwise it will be an error null
            // if we have user, or not or admin this will work
            return request()->user()?->can('admin');
        });
        //pagination
        // Paginator::useBootstrap();this is when you want to use bootstrap
    }
}
