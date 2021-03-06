<?php
namespace App\Services\Internal;
use  App\Models\Internal\Sitemap\Link;
use Spatie\Sitemap\SitemapGenerator;

class SitemapService {

    public $links = [];

    public function __construct() {
        $links = [
           new Link(route('home')),
           new Link(route('number.random')),
           new Link(route('number.range')),
           new Link(route('list.random')),
           new Link(route('image.resize')),
           new Link(route('image.crop')),
           new Link(route('image.fitToCanvas')),
           new Link(route('image.svgConverter')),
           new Link(route('text.notes')),
           new Link(route('text.reverse-text')),
           new Link(route('converters.bitcoin.chart'))
        ];
        $this->setLinks($links);
    }
    public function generate() {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach($this->links as $link) {
            $urlObj = '<loc>'.$link->url.'</loc>';
            $urlObj .= '<priority>'.$link->priority.'</priority>';
            $urlObj .= '<lastmod>'.$link->lastUpdated.'</lastmod>';
            $urlObj .= '<changefreq>'.$link->changeFrequency.'</changefreq>';
            $xml .= sprintf("<url>%s</url>",$urlObj);
        }
        $xml .= '</urlset>';
        return $xml;
    }

    public function setLinks(array $links) {
        $this->links = $links;
    }

}
