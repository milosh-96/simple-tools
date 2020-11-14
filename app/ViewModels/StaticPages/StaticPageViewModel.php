<?php
namespace App\ViewModels\StaticPages;

class StaticPageViewModel extends \App\ViewModels\BasePageViewModel {

    public $view = "static.page";
    public $contentView  = null;
    public function __construct()
    {
    }

    public function getView() {
        return $this->view;
    }

    public function getContentView()
    {
        return $this->contentView;
    }
    public function setContentView($value) {
        $this->contentView = $value;
    }

}
