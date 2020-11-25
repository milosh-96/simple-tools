<?php

namespace App\ViewModels\Auth\Account;

class LoginPageViewModel extends \App\ViewModels\BasePageViewModel
{
    public $userName;
    public $email;
    public $password;

     public function __construct()
    {
        $this->setTitle("Login");
    }
}
