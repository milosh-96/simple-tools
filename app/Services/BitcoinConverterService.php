<?php

namespace App\Services;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class BitcoinConverterService
{
    public static $url = "https://blockchain.info/ticker";

    public static function getData() {

        // get filee from the url, decode json to string, convert json string to array //
        $data = (array)(json_decode(file_get_contents(self::$url)));

        return $data;
    }
}
