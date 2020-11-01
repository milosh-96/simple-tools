<?php

namespace App\Http\Controllers;

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
