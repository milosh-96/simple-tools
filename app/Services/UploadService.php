<?php
namespace App\Services;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class UploadService {
    public static function upload($file) {
        return $file->get();
    }
}
