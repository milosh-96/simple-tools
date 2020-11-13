<?php
namespace App\ViewModels\Images;

use App\Services\ImageService;
// all views should extend this class //
class ResizeImageViewModel extends \App\ViewModels\BasePageViewModel {
    public $resizedImageUrl;

    public $sourceUrl;
    public $uploadedFile = false;
    public $newWidth;
    public $newHeight;
    public function __construct() {
        $this->setTitle("Resize Image to new dimensions");
    }

    public function setSourceUrl($value) {$this->sourceUrl = $value;}
    public function setUploadedFile($value) {$this->uploadedFile = $value;}
    public function setNewWidth($value) {$this->newWidth = $value;}
    public function setNewHeight($value) {$this->newHeight = $value;}

    public function setResizedImageUrl() {
        $props = ["uploaded"=>$this->uploadedFile,"url"=>$this->sourceUrl,"width"=>$this->newWidth,"height"=>$this->newHeight];
        $this->resizedImageUrl = route('engine.image.resize',$props);
    }
}
