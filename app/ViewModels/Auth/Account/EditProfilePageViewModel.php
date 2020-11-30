<?php

namespace App\ViewModels;

class EditProfilePageViewModel extends \App\ViewModels\BasePageViewModel
{
     public function __construct()
    {
        $this->setTitle("Edit Profile");
        $this->setDescription("Edit profile and manage preferences.");
    }
}
