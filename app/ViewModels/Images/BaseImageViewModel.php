<?php
namespace App\ViewModels\Images;

class BaseImageViewModel extends \App\ViewModels\BasePageViewModel {

    public $fileTypes;


    public function setFileTypes() {
        $this->fileTypes = \App\Services\ImageService::$fileTypes;
    }
}
