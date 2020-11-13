<?php
namespace App\ViewModels\StaticPages;

class StaticPageViewModel extends \App\ViewModels\BasePageViewModel {

    public $view = "static.page";
    public function __construct()
    {
    }

    public function getView() {
        return $this->view;
    }

}
