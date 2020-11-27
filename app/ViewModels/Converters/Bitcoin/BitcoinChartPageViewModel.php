<?php
namespace App\ViewModels\Converters\Bitcoin;

class BitcoinChartPageViewModel extends \App\ViewModels\BasePageViewModel {

    private $data = [];
    public function __construct() {
        $this->setTitle("Bitcoin Exchange Rates Table");
        $this->setTagline("Get the latest Bitcoin Exchange rates for major currencies.");
        $this->setDescription("Get the latest Bitcoin Exchange rates for major currencies.");
        $this->insertNote("Source: Blockchain.info");
        $this->setData();
    }

    public function setData()
    {
        $this->data = \App\Services\BitcoinConverterService::getData();
    }
    public function getData()
    {
        return $this->data;
    }

}
