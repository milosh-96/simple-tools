<?php
namespace App\ViewModels;

// all views should extend this class //
abstract class BasePageViewModel {

    // meta
    public $title;
    public $description;
    public $keywords = [];
    //


    public $formSubmitted = false;
    public $errors = [];


    public function __construct() {
        $this->title = "Page";
        $this->description = "Simple Tools is a collection of free tools for everyday use. No hidden paywalls!";
        $this->keywords = ["simple tools","free","simpletools","tools","utilities","no cost"];
    }

    // check if the web site is running in production mode (env value is set) //
    public function isProduction() {
        if(config('app.env') == "production") {
            return true;
        }
        return false;
    }



    // setters and getters //


    public function getTitle() {
        return $this->title;
    }
    public function setTitle($value) {
        $this->title = $value;
    }
    //
    public function getDescription() {
        return $this->description;
    }
    public function setDescription($value) {
        $this->description = $value;
    }
    //
    public function getKeywords() {
        return implode(",",$this->keywords);
    }
    public function setKeywords(array $value) {
        $this->keywords = $value;
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
