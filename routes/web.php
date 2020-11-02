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

Route::get('/',function() {
    $data = ["title"=>"Welcome"];
    return view('index')->with($data);
});
Route::prefix('/image')->group(function() {
    Route::get('/resize',function() {
        $data = ["title"=>"Resize Image"];
        return view('image.resize')->with($data);
    })->name('image.resize');
});
Route::prefix('/number')->group(function() {
    Route::match(["get","post"],'/random',function() {
        $min = request()->min ?? 0;
        $max = request()->max ?? 100000;
        $data = ["title"=>"Random Number","min"=>$min,"max"=>$max,"number"=>App\Services\NumberService::randomNumber($min,$max)];
        return view('number.random')->with($data);
    })->name('number.random');

    Route::match(["get","post"],'/range',function() {
        $start = request()->start ?? 0;
        $end = request()->end ?? 25;
        $separator = request()->separator ?? ",";
        $data = ["title"=>"Range of Numbers","start"=>$start,"end"=>$end,"result"=>App\Services\NumberService::rangeOfNumbers($start,$end,$separator)];
        return view('number.range')->with($data);
    })->name('number.range');
});

Route::prefix('/engine')->group(function() {
    Route::prefix('/image')->group(function() {
        Route::get('/',[App\Http\Controllers\ImageController::class,"resizeImage"])->name('engine.image.resize');
        Route::any('/resize',[App\Http\Controllers\ImageController::class,"resizeImage"])->name('engine.image.resize');
    });
});


