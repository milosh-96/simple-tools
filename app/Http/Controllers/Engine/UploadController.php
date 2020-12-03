<?php

namespace App\Http\Controllers\Engine;

use App\Http\Controllers\Controller;
use App\Services\UploadService;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request) {
        UploadService::upload($request->file);
        return redirect()->back();
    }
}
