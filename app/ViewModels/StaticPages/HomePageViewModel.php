<?php
namespace App\ViewModels\StaticPages;

class HomePageViewModel extends \App\ViewModels\BasePageViewModel {


    public function __construct()
    {
        $this->setTitle("Welcome");
    }


}
