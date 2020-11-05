<?php
namespace App\ViewModels\Lists;
use App\Services\ListService;
class RandomListItemViewModel extends \App\ViewModels\BasePageViewModel {
    public $parsedItems;

    public $randomItemIndex = 0;
    public function __construct() {
        $this->setTitle("Random List Item");
    }


    public function getParsedItems($value) {
        $parsedItems = ListService::parseItems($value,",");
        $this->parsedItems = $parsedItems;
        $this->randomItemIndex = rand(0,(count($this->parsedItems)-1));
        return $parsedItems;
    }
}


