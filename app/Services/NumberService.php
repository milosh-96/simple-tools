<?php
namespace App\Services;
use Illuminate\Support\Facades\Response;

class NumberService {

    public static function randomNumber(int $min = 0,int $max = 100000) {
        return rand($min,$max);
    }
}
