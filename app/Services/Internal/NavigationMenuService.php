<?php
namespace App\Services\Internal;


use  App\Models\Internal\NavigationMenu\Link;
class NavigationMenuService {
    public $items;

    public function __construct() {

        $this->setItems(collect());
    }

    public function getItems() {
        $items = $this->items;
        return $items->sortByDesc("position");
    }

    public function setItems() {
        $items["numbers"] = [
            "title"=>"Number Tools",
            "items"=>[
                new Link("Random Number",route('number.random')),
                new Link("Range of Numbers",route('number.range'))
            ]
        ];
        $items["images"] = [
            "title"=>"Image Tools",
            "items"=>[
                new Link("SVG Converter",route('image.svgConverter')),
                new Link("Fit Image to Canvas",route('image.fitToCanvas')),
                new Link("Resize Image",route('image.resize')),
                new Link("Crop Image",route('image.crop'))
            ]
        ];
        $items["lists"] = [
            "title"=>"List Tools",
            "items"=>[
                new Link("Random Item from List",route('list.random')),
            ]
        ];
        $items["others"] = [
            "title"=>"Other Tools & Utilities",
            "items"=>[
                new Link("Quick Notes",route('text.notes')),
            ]
        ];


        $items["random"] = [
            "position"=>5,
            "class"=>"combined",
            "title"=>"Randomization Tools",
            "items"=>[
               $items["numbers"]["items"][0],
               $items["lists"]["items"][0],
            ]
        ];

        $this->items = collect($items);
    }
}
