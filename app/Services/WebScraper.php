<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;

class WebScraper
{
    protected HttpBrowser $client;

    public function __construct()
    {
        $this->client = new HttpBrowser(HttpClient::create());
    }

    public function fetchNews(string $url)
    {
        $metaData = [];

        $crawler = $this->client->request('GET', $url);

        $crawler->filter('.news-item')->each(function (Crawler $node) use (& $metaData) {

            $metaData['title'] = $node->filter('h2 .title')->count() ?
                $node->filter('h2 .title')->first()->text() : null;

            $metaData['summary'] = $node->filter('.summary')->count() ?
                $node->filter('.summary')->text() : null;

            $metaData['image'] = $node->filter('.image-box img')->count() ?
                $node->filter('.image-box img')->attr('src') : null;

            $metaData['body'] = $node->filter('.container .body')->count() ?
                $node->filter('.container .body')->text() : null;

            $metaData['user_id'] = auth()->user()->id ? auth()->user()->id : null;

            $tmpCategoryName = $node->filter('.category')->count() ?
                $node->filter('.category')->text() : null;
            $category = Category::query()->firstOrCreate([
                'name' => $tmpCategoryName,
            ]);
            $metaData['category_id'] = $category->id;

            DB::transaction(function () use ($metaData) {
                $post = new Post();
                $post->title = $metaData['title'];
                $post->summary = $metaData['summary'];
                $post->body = $metaData['body'];
                $post->image = $metaData['image'];
                $post->user_id = $metaData['user_id'];
                $post->category_id = $metaData['category_id'];
                $post->save();
                return $post;
            });

        });
    }
}
