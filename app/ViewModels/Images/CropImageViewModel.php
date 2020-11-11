<?php
namespace App\ViewModels\Images;

use App\Services\ImageService;
// all views should extend this class //
class CropImageViewModel extends \App\ViewModels\BasePageViewModel {
    public $resizedImageUrl;

    public $sourceUrl;
    public $newWidth;
    public $newHeight;

    public $color = "#ccc";

    public function __construct() {
        $this->setTitle("Crop Image to new dimensions");
        $this->setTagline("You can easily crop a part of an image with SimpleTools Crop Image. The image will be cropped to center.");
    }

    public function setSourceUrl($value) {$this->sourceUrl = $value;}
    public function setColor($value) {$this->color = $value;}
    public function setNewWidth($value) {$this->newWidth = $value;}
    public function setNewHeight($value) {$this->newHeight = $value;}

    public function setResizedImageUrl() {
        $props = ["color"=>$this->color,"url"=>$this->sourceUrl,"width"=>$this->newWidth,"height"=>$this->newHeight];
        $this->resizedImageUrl = route('engine.image.crop',$props);
    }
}
