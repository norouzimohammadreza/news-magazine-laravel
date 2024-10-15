<?php

namespace App\Services;

use App\Base\ServiceResult;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Post;

class AppService
{
    public $mostComments,$banner,$categories;
    public function __construct()
    {
        $this->mostComments= Post::withCount('comment')->orderBy('comment_count', 'DESC')->limit(3)->get();
        $this->banner = Banner::first();
        $this->categories = Category::all();
    }
    public function mainPage() :ServiceResult
{
    $topSelectedPosts = Post::withCount('comment')
        ->where('published_at','<',now())
        ->orderBy('published_at', 'DESC')
        ->limit(3)
        ->get();

    $breakingNews = Post::where('breaking_news', 1)
        ->where('published_at','<',now())
        ->orderBy('published_at', 'DESC')
        ->first();
    $latestPosts = Post::withCount('comment')
        ->orderBy('published_at', 'DESC')
        ->limit(4)
        ->get();
    $popularPosts = Post::withCount('comment')
        ->orderBy('view', 'DESC')
        ->limit(3)
        ->get();
    return new ServiceResult(200,[
        'topSelectedPosts'=>$topSelectedPosts,
        'breakingNews'=>$breakingNews,
        'latestPosts'=>$latestPosts,
        'popularPosts'=>$popularPosts,
    ]);
}

}
