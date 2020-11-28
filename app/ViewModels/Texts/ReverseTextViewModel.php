<?php

namespace App\ViewModels\Texts;

use App\Services\TextService;

class ReverseTextViewModel extends \App\ViewModels\BasePageViewModel
{
    public $reverseOnlyWords = false;

     public function __construct()
    {
        $this->setTitle("Reverse Text");
        $this->setTagline("Quickly reverse any text, sentence or name.");
    }


    public function setReverseOnlyWords($value) {
        $this->reverseOnlyWords = $value;
    }
    public function reverseOnlyWords() {
        return $this->reverseOnlyWords;
    }

    public function reverseText($value)
    {
        if($this->reverseOnlyWords()) {
            return TextService::reverseOnlyWords($value);
        }
        return TextService::reverseText($value);
    }
}
