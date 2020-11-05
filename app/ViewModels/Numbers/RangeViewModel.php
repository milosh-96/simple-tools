<?php
namespace App\ViewModels\Numbers;

use App\Services\NumberService;

class RangeViewModel extends \App\ViewModels\BasePageViewModel {

    public $start = 0;
    public $end = 25;
    public $separator = ",";
    public $generatedRange;

    public $separatorList = [
        ","=>"Comma (,)",
        "."=>"Dot (.)",
        "-"=>"Hyphen (-)",
        "_"=>"Underscore (_)",
        "space"=>"Space key (< >)",
        "tab"=>"Tab key (<  >)"
    ];

    public function __construct()
    {
        $this->setTitle("Generate Range of Numbers");
    }

    // setters //

    public function setStart($value) {$this->start = $value;}
    public function setEnd($value) {$this->end = $value;}
    public function setSeparator($value) {$this->separator = $value;}


    public function generateRange() {
        $this->generatedRange = NumberService::rangeOfNumbers($this->start,$this->end,$this->separator);
        return $this->generatedRange;
    }
}
