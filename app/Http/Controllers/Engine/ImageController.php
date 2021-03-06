<?php


namespace App\Http\Controllers\Engine;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Services\ImageService;
class ImageController extends Controller
{

    public function resizeImage() {
        $props = request()->all();
        //return $props;
        return ImageService::resize(request()->url,$props);
    }
    public function cropImage() {
        $props = request()->all();
        //return $props;
        return ImageService::crop(request()->url,$props);
    }
    public function fitToCanvas() {
        $props = request()->all();
        //return $props;
        return ImageService::fitToCanvas(request()->url,$props);
    }
    public function svgConverter() {
        $props = request()->all();
        //return $props;
        return ImageService::svgConverter(request()->url,$props);
    }
}
