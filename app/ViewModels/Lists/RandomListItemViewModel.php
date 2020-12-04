<?php
namespace App\ViewModels\Lists;

use App\Models\ItemLists\ItemList;
use App\Services\ListService;
class RandomListItemViewModel extends \App\ViewModels\BasePageViewModel {
    //itemlist class//
    public $itemList;
    //
    public $parsedItems;

    public $updateMode = false;
    public $saveOrUpdateUrl;
    public $saveOrUpdateButton;

    public $separator = ",";
    public $randomItemIndex = 0;


    public $itemsString;
    public $defaultItemsString;

    public function __construct() {
        $this->itemList = new ItemList(["original_separator"=>","]);
        $this->setTitle("Get Random Item from List");
        $this->setDescription("Easily get random item from your list. You can enter as many items as you want.");
        $this->setDefaultItemsString();
    }

    public function getParsedItems($value) {
        $parsedItems = ListService::parseItems($this->itemList->original_input,$this->itemList->original_separator);
        $this->parsedItems = $parsedItems;
        $this->randomItemIndex = rand(0,(count($this->parsedItems)-1));
        return $parsedItems;
    }

    public function setFormSubmitted() {
        $this->saveOrUpdateButton = "Save";
        $this->saveOrUpdateUrl = route('list.store');
        if($this->itemList->original_input == null) {
            $this->insertError("The list is empty.");
            return false;
        }
        $this->formSubmitted = true;
    }

    public function setItemsString($value) {
        $this->itemList->original_input = $value;
    }
    public function setDefaultItemsString() {
        $this->defaultItemsString = "Coffee,Sandwich,Milk";
    }

    public function setUpdateMode() {
        $this->updateMode = true;
        $this->saveOrUpdateUrl = route('list.store',["itemList"=>$this->itemList->id]);
        $this->saveOrUpdateButton = "Update";
    }


    public function setSeparator($value) {
        $this->itemList->original_separator = $value;
    }
}


