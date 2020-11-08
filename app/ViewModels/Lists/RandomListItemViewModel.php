<?php
namespace App\ViewModels\Lists;
use App\Services\ListService;
class RandomListItemViewModel extends \App\ViewModels\BasePageViewModel {
    public $parsedItems;

    public $separator = ",";
    public $randomItemIndex = 0;


    public $itemsString;
    public $defaultItemsString;

    public function __construct() {
        $this->setTitle("Get Random Item from List");
        $this->setDefaultItemsString();
    }

    public function getParsedItems($value) {
        $parsedItems = ListService::parseItems($value,$this->separator);
        $this->parsedItems = $parsedItems;
        $this->randomItemIndex = rand(0,(count($this->parsedItems)-1));
        return $parsedItems;
    }


    public function setItemsString($value) {
        $this->itemsString = $value;
    }
    public function setDefaultItemsString() {
        $this->defaultItemsString = "Coffee,Sandwich,Milk";
    }


    public function setSeparator($value) {
        $this->separator = $value;
    }
}


