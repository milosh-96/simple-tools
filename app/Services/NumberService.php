<?php
namespace App\Services;
use Illuminate\Support\Facades\Response;

class NumberService {

    public static function randomNumber(int $min = 0,int $max = 100000) {
        return rand($min,$max);
    }

    public static function rangeOfNumbers($start = 0,$end = 25,$separator = ",") {
        $numbers = [];
        for($start; $start <= $end;$start++) {
            $numbers[] = $start;
        }

        return implode($numbers,self::makeSeparator($separator));
    }


    private static function makeSeparator($value) {
        $separator = $value;
        switch($value) {
            case "space":
                $separator = " ";
            break;
            case "tab":
                $separator = "\t";
            break;
        }
        return $separator;
        }
    }


