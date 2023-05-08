<?php
namespace App\Services;

use MailchimpMarketing\ApiClient;

    //implements connected to Newsletter interface
    class MailchimpNewsletter implements Newsletter{

        //if there is no constructor, foo if laravel want a value
        public function __construct(protected ApiClient $client)
        {
            //
        }
    
        public function subscribed(string $email, string $list = null){//$list is for the future if they want to add new list but it is not required
            //value of list, ?? means if null then set the value to the declared value
            $list ??= config('services.mailchimp.lists.subscribers');

            //when someone subscribed then it will be saved to mailchimp, authorized user can access that and will see the total number of subscribed user
            //config is the lists number in from mailchimp located in config, services
            //meaning to return to client protected function
            return $this->client->lists->addListMember($list,[
                'email_address'=>$email,
                'status'=>'subscribed'
            ]);
        }

        //client from if there is no constructor
        // protected function client(){
        //     return $this->client->setConfig([
        //         'apiKey' => config('services.mailchimp.key'),
        //         'server' => 'us21'
        //     ]);
        // }
        
    }

?>
