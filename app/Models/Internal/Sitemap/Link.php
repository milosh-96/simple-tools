<?php

namespace App\Models\Internal\Sitemap;


class Link
{
    public $url;
    public $changeFrequency;
    public $priority;
    public $lastUpdated;

    public function __construct($url,$changeFrequency = "yearly",$priority =  "0.9") {
        $this->url = $url;
        $this->changeFrequency = $changeFrequency;
        $this->changeFrequency = $changeFrequency;
        $this->lastUpdated = date("Y-m-d");
    }
}
