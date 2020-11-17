<?php

namespace App\Services;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ImageService
{

    public static $fileTypes = ["png"=>"image/png","jpg"=>"image/jpg","jpeg"=>"image/jpeg","bmp"=>"image/bmp"];


    public static function resize($url, $properties, $imagickReturn = false)
    {

        try {

            $imageBlob = file_get_contents($url);

            $source = new \Imagick();
            $source->readImageBlob($imageBlob);

            $mimeType = self::getMimeType($imageBlob);

            $dimensions = self::determineResizeDimensions($source, $properties);

            $source->resizeImage($dimensions["width"], $dimensions["height"], \Imagick::FILTER_BOX, true);
            if ($imagickReturn) {
                return $source;
                }
            $response = Response::make($source, 200)->header("Content-Type", $mimeType->mime);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function crop($url, $properties)
    {
        try {
            $bgLayer = new \Imagick();
            $bgLayer->newImage($properties["width"], $properties["height"], $properties["color"]);

            $imageBlob = file_get_contents($url);
            $source = new \Imagick();
            $source->readImageBlob($imageBlob);

            $heightDistance = (($source->getImageHeight() - $properties["height"]) / 2);
            $widthDistance = (($source->getImageWidth() - $properties["width"]) / 2);

            $offsetX = 0;
            $offsetY = 0;
            if (($properties["width"] - $source->getImageWidth() / 2) > 0) {
                $offsetX = ($properties["width"] - $source->getImageWidth()) / 2;
            }
            if (($properties["height"] - $source->getImageHeight() / 2) > 0) {
                $offsetY = ($properties["height"] - $source->getImageHeight()) / 2;
            }

            $mimeType = self::getMimeType($imageBlob);


            $source->cropImage($properties["width"], $properties["height"], $widthDistance, $heightDistance);
            $bgLayer->compositeImage($source, \imagick::COMPOSITE_OVER, $offsetX, $offsetY);
            $bgLayer->setImageFormat($mimeType->extension);


            $response = Response::make($bgLayer, 200)->header("Content-Type",$mimeType->mime);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function svgConverter($url,$properties) {

        $svgData = file_get_contents($url);
        $source = new \Imagick();
        $source->setBackgroundColor(new \ImagickPixel("transparent"));
        $source->readImageBlob($svgData);
        $source->setImageFormat($properties["fileType"]);
        $response = Response::make($source, 200);
        $contentType = self::$fileTypes[$properties["fileType"]];
        return $response->header("Content-Type",$contentType );
    }

    public static function fitToCanvas($url, $properties)
    {
        try {
            $imageWidth = ($properties["canvasHeight"] - $properties["padding"]);

            if($properties["canvasWidth"] < $properties["canvasHeight"]) {
                $imageWidth = ($properties["canvasWidth"] - $properties["padding"]);
            }
            $resizedImage = self::resize($url, ["height" => $imageWidth], true);

            $offsetX = ($properties["canvasWidth"] - $resizedImage->getImageWidth()) / 2; //(($properties["canvasWidth"] - $properties["padding"]) / 2);
            $offsetY = $properties["padding"] / 2; //($properties["canvasHeight"] -  $resizedImage->getImageHeight()) / 2 ;   $offsetX = $properties["padding"] / 2; //(($properties["canvasWidth"] - $properties["padding"]) / 2);

            if($properties["canvasWidth"] <= $properties["canvasHeight"]) {
                $offsetX = $properties["padding"] / 2;
                $offsetY = ($properties["canvasHeight"] - $resizedImage->getImageHeight()) / 2; //(($properties["canvasWidth"] - $properties["padding"]) / 2);

            }

            $overlay = new \Imagick();
            $overlay->newImage($properties["canvasWidth"], $properties["canvasHeight"], $properties["color"] ?? "transparent");
            $overlay->compositeImage($resizedImage, \Imagick::COMPOSITE_OVER, $offsetX, $offsetY);

            $mimeType = self::getMimeType(file_get_contents(($url)));
            $overlay->setImageFormat($mimeType->extension);
            $response = Response::make($overlay, 200)->header("Content-Type",$mimeType->mime);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    private static function determineResizeDimensions(\Imagick $image, $properties)
    {
        $width = $image->getImageWidth();
        $height = $image->getImageHeight();

        if (isset($properties["width"]) && isset($properties["height"])) {
            $width = $properties["width"];
            $height = $properties["height"];
            return ["width" => $width, "height" => $height];
        }

        $aspectRatio = $width / $height;

        if (isset($properties["width"])) {
            $width = $properties["width"];
            $height = ($width / $aspectRatio);

            return ["width" => $width, "height" => $height];
        }
        if (isset($properties["height"])) {
            $height = $properties["height"];
            $width = ($height * $aspectRatio);

            return ["width" => $width, "height" => $height];
        }
        return ["width" => $width, "height" => $height];
    }

    private static function getMimeType($value) {
        $file_info = new \finfo(FILEINFO_MIME_TYPE);
        $mime_type = $file_info->buffer($value);

        return (object)["mime"=>$mime_type,"extension"=> explode("/",$mime_type)[1]];
    }
}
