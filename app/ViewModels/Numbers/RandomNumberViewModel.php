<?php
namespace App\ViewModels\Numbers;

class RandomNumberViewModel extends \App\ViewModels\BasePageViewModel {

    public $min = 0;
    public $max = 25;

    public $randomNumber;
    public function __construct() {
        $this->setTitle("Get Random Number");
        $this->setDescription("Easily get a random number.");
    }


    public function setMinNumber($value) {
        $this->min = $value;
    }
    public function setMaxNumber($value) {
        $this->max = $value;
    }

    public function getRandomNumber() {
        $randomNumber = \App\Services\NumberService::randomNumber($this->min,$this->max);
        $this->randomNumber = $randomNumber;
        return $randomNumber;
    }

}


