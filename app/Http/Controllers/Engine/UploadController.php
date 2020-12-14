<?php

namespace App\Http\Controllers\Engine;

use App\Http\Controllers\Controller;
use App\Services\UploadService;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request) {
        return response(UploadService::upload($request->file('file')))->header("Content-Type","image/png");
        return redirect()->back();
    }
}
