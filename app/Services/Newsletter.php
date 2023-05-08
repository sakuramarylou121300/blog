<?php

namespace App\Services;

//to define contract any implementors of the interface must conform too
interface Newsletter{

    public function subscribed(string $email, string $list = null);

}