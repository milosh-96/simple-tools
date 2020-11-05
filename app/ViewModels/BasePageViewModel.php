<?php
namespace App\ViewModels;

abstract class BasePageViewModel {

    public function __construct() {
        $this->title = "Page";
    }

    public function getTitle() {
        return $this->title;
    }
    public function setTitle($value) {
        $this->title = $value;
    }

}
