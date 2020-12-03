<?php

use App\Events\Account\UserRegisteredEvent;
use App\Http\Controllers\Engine\UploadController;
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




Route::prefix('converters')->group(function() {
    Route::prefix('bitcoin')->group(function() {
        Route::get('chart',[App\Http\Controllers\Converters\BitcoinController::class,"chart"])->name('converters.bitcoin.chart');
    });
});

Route::prefix('auth')->group(function() {
    Route::group(["middleware"=>"auth","prefix"=>"account"],function() {
        Route::get('edit-profile',[App\Http\Controllers\Auth\AccountController::class,"editProfile"])->name('profile.edit');
        Route::get('edit-password',[App\Http\Controllers\Auth\AccountController::class,"editPassword"])->name('profile.edit-password');
    });
});

Route::prefix("/pages")->group(function() {
    Route::get("/terms-of-service",function() {
        $viewModel = new \App\ViewModels\StaticPages\StaticPageViewModel;

        $viewModel->setTitle("Terms of Service");
        $viewModel->setTagline("Few things about this web site...");
        $viewModel->setContentView("static.pages.tos");
        $data = ["viewModel"=>$viewModel];
        return view($viewModel->getView())->with($data);
    })->name('tos');
});
Route::prefix("/image")->group(function() {
    Route::match(["get","post"],"/resize",[App\Http\Controllers\ImageController::class,"resizeImage"])->name("image.resize");
    Route::match(["get","post"],"/crop",[App\Http\Controllers\ImageController::class,"cropImage"])->name("image.crop");
    Route::match(["get","post"],"/fit-to-canvas",[App\Http\Controllers\ImageController::class,"fitToCanvas"])->name("image.fitToCanvas");
    Route::match(["get","post"],"/svg-converter",[App\Http\Controllers\ImageController::class,"svgConverter"])->name("image.svgConverter");
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
    Route::match(["get","post"],'reverse-text',[App\Http\Controllers\TextController::class,"reverseText"])->name('text.reverse-text');
});

Route::prefix("/questions")->group(function() {
    Route::post('/',[App\Http\Controllers\Questions\QuestionController::class,"store"])->name('question.store');
    Route::prefix("question")->group(function() {
        Route::prefix('/{question}')->group(function(){
            Route::get('/',[App\Http\Controllers\Questions\QuestionController::class,"show"])->name('question.show');
            Route::post('/answer',[App\Http\Controllers\Questions\QuestionAnswerController::class,"store"])->name('question.answer.store');
        });
});
});

//

Route::get('/sitemap',function() {
    $sitemapService = new App\Services\Internal\SitemapService();
    return response($sitemapService->generate(), 200)->header("Content-Type","application/xml");
});













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

    Route::prefix("upload")->group(function() {
        Route::post("/",[UploadController::class,"upload"])->name('upload');
    });
});




Route::get('test',function() {
    event(new UserRegisteredEvent());
    return redirect()->route('home');
});
