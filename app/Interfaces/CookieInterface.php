<?php
namespace App\Interfaces;


interface CookieInterface
{
    public function whereCookie($cookie_value);
    public function newUser($cookie_value);
    
}

?>