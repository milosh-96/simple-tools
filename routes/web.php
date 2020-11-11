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
    $data = ["viewModel"=>new \App\ViewModels\StaticPages\HomePageViewModel];
    return view("index")->with($data);
})->name('home');
Route::prefix("/image")->group(function() {
    Route::match(["get","post"],"/resize",[App\Http\Controllers\ImageController::class,"resizeImage"])->name("image.resize");
    Route::match(["get","post"],"/crop",[App\Http\Controllers\ImageController::class,"cropImage"])->name("image.crop");
    Route::match(["get","post"],"/fit-to-canvas",[App\Http\Controllers\ImageController::class,"fitToCanvas"])->name("image.fitToCanvas");
});
Route::prefix("/number")->group(function() {
    Route::match(["get","post"],"random",[App\Http\Controllers\NumberController::class,"random"])->name("number.random");
    Route::match(["get","post"],"range",[App\Http\Controllers\NumberController::class,"range"])->name("number.range");
});
Route::prefix("/list")->group(function() {
    Route::match(["get","post"],"random",[App\Http\Controllers\ListController::class,"random"])->name("list.random");
});

Route::prefix("/text")->group(function() {
    Route::get('/notes',[App\Http\Controllers\TextController::class,"notes"])->name('text.notes');
});




//

Route::get('/sitemap',function() {
    $sitemapService = new App\Services\Internal\SitemapService();
    return $sitemapService->generate();
});













//routes for raw results (mostly for api endpoints) //
Route::prefix("engine")->group(function() {
    Route::prefix("/image")->group(function() {
        Route::any("/resize",[App\Http\Controllers\Engine\ImageController::class,"resizeImage"])->name("engine.image.resize");
        Route::any("/crop",[App\Http\Controllers\Engine\ImageController::class,"cropImage"])->name("engine.image.crop");
        Route::any("/fit-to-canvas",[App\Http\Controllers\Engine\ImageController::class,"fitToCanvas"])->name("engine.image.fitToCanvas");
    });
});


