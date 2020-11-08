<?php
namespace App\ViewModels;

// all views should extend this class //
abstract class BasePageViewModel {

    public $title;
    public $formSubmitted = false;

    public $errors = [];
    public function __construct() {
        $this->title = "Page";
    }

    public function getTitle() {
        return $this->title;
    }
    public function setTitle($value) {
        $this->title = $value;
    }

    public function setFormSubmitted() {
        $this->formSubmitted = true;
    }


    public function getErrors() {
        return $this->errors;
    }

    public function insertError($value) {
        $this->errors[] = $value;
    }

}
