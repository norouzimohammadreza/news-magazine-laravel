<?php

namespace App\Services;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;

class WebScraper
{
    protected HttpBrowser $client;

    public function __construct()
    {
        $this->client = new HttpBrowser(HttpClient::create());
    }
    public function fetchNews(string $url)
    {
        $crawler = $this->client->request('GET', $url);
    }
}
