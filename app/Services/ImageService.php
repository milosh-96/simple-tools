<?php
namespace App\Services;
use Illuminate\Support\Facades\Response;

class ImageService {
   public static function resize($url,$properties) {

        try {
            $imageBlob = file_get_contents($url);
            $source = new \Imagick();
            $source->readImageBlob($imageBlob);

            $dimensions = self::determineResizeDimensions($source,$properties);

            $source->resizeImage($dimensions["width"],$dimensions["height"],\Imagick::FILTER_BOX, true);
            $response = Response::make($source, 200)->header("Content-Type","image/jpeg");
            return $response;
        }
        catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function crop($url,$properties) {
        try {
            $bgLayer = new \Imagick();
            $bgLayer->newImage($properties["width"],$properties["height"],$properties["color"]);

            $imageBlob = file_get_contents($url);
            $source = new \Imagick();
            $source->readImageBlob($imageBlob);

            $heightDistance = (($source->getImageHeight() - $properties["height"])/2);
            $widthDistance = (($source->getImageWidth() - $properties["width"])/2);

            $overlayX = 0;
            $overlayY = 0;
            if(($properties["width"] - $source->getImageWidth() / 2)>0) {
                $overlayX = ($properties["width"] - $source->getImageWidth()) / 2;
            }
            if(($properties["height"] - $source->getImageHeight() / 2)>0) {
                $overlayY = ($properties["height"] - $source->getImageHeight()) / 2;
            }

            $source->cropImage($properties["width"],$properties["height"],$widthDistance,$heightDistance);
            $bgLayer->compositeImage($source,\imagick::COMPOSITE_OVER, $overlayX , $overlayY);
            $bgLayer->setImageFormat("png");
            $response = Response::make($bgLayer, 200)->header("Content-Type","image/jpeg");
            return $response;
        }
        catch(\Exception $e) {
            return $e->getMessage();
        }
    }


    private static function determineResizeDimensions(\Imagick $image,$properties) {
        $width = $image->getImageWidth();
        $height = $image->getImageHeight();

        if(isset($properties["width"]) && isset($properties["height"])) {
            $width = $properties["width"];
            $height = $properties["height"];
            return ["width"=>$width,"height"=>$height];
        }

        $aspectRatio = $width / $height;

        if(isset($properties["width"])) {
            $width = $properties["width"];
            $height = ($width / $aspectRatio);

            return ["width"=>$width,"height"=>$height];
        }
        if(isset($properties["height"])) {
            $height = $properties["height"];
            $width = ($height * $aspectRatio);

            return ["width"=>$width,"height"=>$height];
        }
        return ["width"=>$width,"height"=>$height];


    }

}
