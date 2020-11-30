<?php

namespace App\ViewModels\Auth\Account;

class EditProfilePageViewModel extends \App\ViewModels\BasePageViewModel
{
    public $user;
     public function __construct()
    {
        $this->setTitle("Edit Profile");
        $this->setDescription("Edit profile and manage preferences.");
        $this->user = auth()->user();
    }



}
