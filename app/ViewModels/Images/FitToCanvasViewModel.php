<?php
namespace App\ViewModels\Images;

use App\Services\ImageService;
// all views should extend this class //
class FitToCanvasViewModel extends \App\ViewModels\BasePageViewModel {
    public $resizedImageUrl;

    public $sourceUrl;
    public $canvasWidth;
    public $canvasheight;
    public $padding;

    public $color = "transparent";
    public $transparent = false;

    public function __construct() {
        $this->setTitle("Fit Image to Canvas");
        $this->setTagline(
            "With this tool you can easily put image of any size in a box. For example, you can fit large image to 256x128 box. The image
will be resized so it can populate the canvas. You can also specify vertical and horizontal spacing."
        );
        $this->setKeywords([
            "fit to canvas","canvas image","fit image in canvas","fit to box","boxed image","overlay","photoshop like canvas tool",
            "photoshop canvas","image container"
        ]);
    }

    public function setSourceUrl($value) {$this->sourceUrl = $value;}
    public function setColor($value) {$this->color = $value;}
    public function setCanvasWidth($value) {$this->canvasWidth = $value;}
    public function setCanvasHeight($value) {$this->canvasHeight = $value;}
    public function setPadding($value) {$this->padding = $value;}
    public function setTransparent($value) {$this->transparent = $value;}

    public function setResizedImageUrl() {
        $props = ["color"=>$this->color,"url"=>$this->sourceUrl,
        "canvasWidth"=>$this->canvasWidth,
        "canvasHeight"=>$this->canvasHeight,
        "padding"=>$this->padding
    ];
        $this->resizedImageUrl = route('engine.image.fitToCanvas',$props);
    }
}
