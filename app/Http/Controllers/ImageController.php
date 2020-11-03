<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ImageService;
class ImageController extends Controller
{

    public function resizeImage() {
        $data = ["title"=>"Resize Image"];
        return view('image.resize')->with($data);
    }
}
