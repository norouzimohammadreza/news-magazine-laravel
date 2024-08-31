<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index(){

        $topSelectedPosts = Post::select('posts.*',DB::raw('COUNT(comments.post_id) as comments'))
                ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
                ->where('selected', 1)
                ->where('published_at','<',now())
                ->groupBy('posts.id')
                ->orderBy('published_at', 'DESC')
                ->limit(3)
                ->get();
        $breakingNews = Post::where('breaking_news', 1)
            ->where('published_at','<',now())
            ->groupBy('posts.id')
            ->orderBy('published_at', 'DESC')
        ->first();
        $latestPosts = Post::select('posts.*',DB::raw('COUNT(comments.post_id) as comments'))
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->groupBy('posts.id')
            ->orderBy('published_at', 'DESC')
            ->limit(4)
            ->get();
       

        $categories = Category::all();
        return view('app.index',[
            'categories' => $categories,
            'topSelectedPosts' => $topSelectedPosts,
            'breakingNews' => $breakingNews,
            'latestPosts' => $latestPosts
        ]);
    }
    public function category($category)
    {
        return $category;
    }
}
