<?php
namespace App\Services;
use Illuminate\Support\Facades\Response;

class ListService {




    public static function parseItems($listString,$separator = ",") {
        $items = explode($separator,$listString);
        return $items;
    }
}
