<?php

namespace App\ViewModels\Texts;

class ReverseTextViewModel extends \App\ViewModels\BasePageViewModel
{
     public function __construct()
    {
        $this->setTitle("Reverse Text");
        $this->setTagline("Quickly reverse any text, sentence or name.");
    }
}
