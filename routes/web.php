<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
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

Route::get("/",function() {
    $data = ["title"=>"Welcome"];
    return view("index")->with($data);
});
Route::prefix("/image")->group(function() {
    Route::get("/resize",[App\Http\Controllers\ImageController::class,"resizeImage"])->name("image.resize");
});
Route::prefix("/number")->group(function() {
    Route::match(["get","post"],"random",[App\Http\Controllers\NumberController::class,"random"])->name("number.random");
    Route::match(["get","post"],"range",[App\Http\Controllers\NumberController::class,"range"])->name("number.range");
});

//
Route::prefix("engine")->group(function() {
    Route::prefix("/image")->group(function() {
        Route::get("/",[App\Http\Controllers\Engine\ImageController::class,"resizeImage"])->name("engine.image.resize");
        Route::any("/resize",[App\Http\Controllers\Engine\ImageController::class,"resizeImage"])->name("engine.image.resize");
    });
});


