<?php

use App\Models\ItemLists\ItemList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['api']], function () {

//routes for raw results (mostly for api endpoints) //
Route::prefix("engine")->group(function() {
    Route::prefix("/image")->group(function() {
        Route::any("/resize",[App\Http\Controllers\Engine\ImageController::class,"resizeImage"])->name("engine.image.resize");
        Route::any("/crop",[App\Http\Controllers\Engine\ImageController::class,"cropImage"])->name("engine.image.crop");
        Route::any("/fit-to-canvas",[App\Http\Controllers\Engine\ImageController::class,"fitToCanvas"])->name("engine.image.fitToCanvas");
        Route::any("/svg-converter",[App\Http\Controllers\Engine\ImageController::class,"svgConverter"])->name("engine.image.svgConverter");
    });

    Route::prefix('bitcoin')->group(function() {
        Route::get('get-data',function() {
            return App\Services\BitcoinConverterService::getData();
        });
    });

    Route::prefix('list')->group(function() {
        Route::prefix('{id}')->group(function() {
            Route::get('get',function(Request $request,ItemList $itemList) {
                return $itemList->find($request->id);
            });
        });
        Route::post('random',function(Request $request) {
           return ["items"=>App\Services\ListService::parseItems(
               $request->items,
               $request->separator
            ),
            "randomItem"=>App\Services\ListService::getRandomItem(
                $request->items,
                $request->separator
            )
        ];
        })->name('engine.list.random');
    });


    Route::prefix("upload")->group(function() {
        Route::post("/",[UploadController::class,"upload"])->name('upload');
    });
});
});
