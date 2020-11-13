<?php
namespace App\ViewModels\Images;

class BaseImageViewModel extends \App\ViewModels\BasePageViewModel {

    public $resizedImageUrl;
    public $sourceUrl;

    public $fileTypes;

    public function setSourceUrl($value) {$this->sourceUrl = $value;}

    public function setFileTypes() {
        $this->fileTypes = \App\Services\ImageService::$fileTypes;
    }
}
