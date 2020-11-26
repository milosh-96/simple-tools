<?php
namespace App\ViewModels;

use Illuminate\Support\Facades\Auth;

// all views should extend this class //
abstract class BasePageViewModel {

    // meta
    public $title;
    public $tagline;
    public $description;
    public $keywords = [];

    //


    public $formSubmitted = false;
    public $errors = [];
    public $notes = [];


    public function __construct() {
        $this->title = "Page";
        print_r(auth()->user());
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
    public function getTagline() {
        return $this->tagline;
    }
    public function setTagline($value) {
        $this->tagline = $value;
    }
    //
    public function getDescription() {
        // if child class set description a space will be added between that and default string. otherwise, no//
        if($this->description == "" && $this->tagline != null) {
            $this->description = $this->tagline;
        }
        return sprintf("%s%s",($this->description) ? $this->description . " " : "","Simple Tools is a collection of free tools for everyday use. No hidden paywalls!");
    }
    public function setDescription($value) {
        $this->description = $value;
    }
    //
    public function getKeywords() {
        // merge page-specific keywords with global //
        return implode(",",array_merge($this->keywords,["simple tools","free","simpletools","tools","utilities","no cost","api","rest api","developers","commercial use","tools for developers","developer tools"]));
    }

    public function setKeywords(array $value) {
        $this->keywords = $value;
    }





    // check if form is submitted, used for single page tools (both get & post)
    public function setFormSubmitted() {
        $this->formSubmitted = true;
    }


    public function getErrors() {
        return $this->errors;
    }

    public function insertError($value) {
        $this->errors[] = $value;
    }
    public function getNotes() {
        return $this->notes;
    }

    public function insertNote($value) {
        $this->notes[] = $value;
    }
}
