<?php
namespace App\Services;

class ConvertKitNewsletter implements Newsletter{

    public function subscribed(string $email, ?string $list = null)
    {
        //subscribed the user with ConvertKit-specific
        //API request
    }

}