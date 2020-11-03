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
}
