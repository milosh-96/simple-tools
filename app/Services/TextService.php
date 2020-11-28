<?php
namespace App\Services;
use Illuminate\Support\Facades\Response;

class TextService {
    public static function reverseText($value) {
        $arrayOfText = preg_split('//u', $value, null, PREG_SPLIT_NO_EMPTY);
        $text = implode('',array_reverse($arrayOfText));
        return $text;
    }
    public static function reverseOnlyWords($value) {
        $words = explode(" ",$value);
        $reversedWords = [];
        foreach($words as $word) {
            $reversedWords[] = str_replace(["!",".",",","?"],[],self::reverseText($word));
        }
        return implode(" ",$reversedWords);
    }
}
