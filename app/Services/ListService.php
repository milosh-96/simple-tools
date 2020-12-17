<?php
namespace App\Services;
use Illuminate\Support\Facades\Response;

class ListService {



    public static function getRandomItem(string $list,string $separator) {
        $parsedItems = self::parseItems($list,$separator);
        $randomItemIndex = rand(0,(count($parsedItems)-1));
        return $parsedItems[$randomItemIndex];
    }

    public static function parseItems(string $list,$separator = ",") {
        $items = explode($separator,$list);
        return $items;
    }
}
