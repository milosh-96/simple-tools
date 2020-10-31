<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Respnse;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
});

Route::prefix('/image')->group(function() {
    Route::get('/',function() {
        try {
            $imageBlob = file_get_contents(request()->url);
            $source = new \Imagick();
            $source->readImageBlob($imageBlob);
            $source->resizeImage(256,128,\Imagick::FILTER_BOX, true);
            $response = Response::make($source, 200)->header("Content-Type","image/jpeg");
            return $response;
        }
        catch(\Exception $e) {
            return $e->getMessage();
        }
        $im = new \Imagick();

    });
});
