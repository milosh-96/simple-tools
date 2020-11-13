<?php
namespace App\ViewModels\Images;

class SvgConverterViewModel extends \App\ViewModels\Images\BaseImageViewModel {

    public $sourceUrl;
    public $resizedImageUrl;
    public $selectedType = "png";

    public function __construct()
    {
        $this->setFileTypes();
        $this->setTitle("SVG Converter");
        $this->setTagline("Convert SVG to any image format.");
        $this->setDescription("SVG Converter allows you to easily convert SVG files to PNG or any other image format.");
    }


    public function setResizedImageUrl() {
        $props = ["url"=>$this->sourceUrl,"fileType"=>$this->selectedType];
        $this->resizedImageUrl = route('engine.image.svgConverter',$props);
    }
   

    public function setSelectedType($value) {
        $this->selectedType = $value;
    }

    public function isSelectedType($value) {
        if($value == $this->selectedType) {
            return true;
        }
        return false;
    }

}
