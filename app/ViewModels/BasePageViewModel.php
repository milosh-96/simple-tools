<?php
namespace App\ViewModels;

abstract class BasePageViewModel {

    public $items = array();
    public function __construct() {
        $this->title = "Page";
    }

    protected function setTitle($value) {
        $this->title = $value;
    }
}
