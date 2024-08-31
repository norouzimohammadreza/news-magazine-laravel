<?php

namespace App\Http\Controllers;

use App\Models\Banner;
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
        $popularPosts = Post::select('posts.*',DB::raw('COUNT(comments.post_id) as comments'))
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->groupBy('posts.id')
            ->orderBy('view', 'DESC')
            ->limit(3)
            ->get();
        $mostComments = Post::select('posts.*',DB::raw('COUNT(comments.post_id) as comments'))
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->groupBy('posts.id')
            ->orderBy('comments', 'DESC')
            ->limit(3)
            ->get();
            $banner = Banner::first();

        $categories = Category::all();
        return view('app.index',[
            'categories' => $categories,
            'topSelectedPosts' => $topSelectedPosts,
            'breakingNews' => $breakingNews,
            'latestPosts' => $latestPosts,
            'popularPosts' => $popularPosts,
            'mostComments' => $mostComments,
            'banner' => $banner
        ]);
    }
    public function category($category)
    {
        $categories = Category::all();
        $mostComments = Post::select('posts.*',DB::raw('COUNT(comments.post_id) as comments'))
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->groupBy('posts.id')
            ->orderBy('comments', 'DESC')
            ->limit(3)
            ->get();
        $banner = Banner::first();

        $posts=Post::select('posts.*',DB::raw('COUNT(comments.post_id) as comments'))
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->groupBy('posts.id')->where('category_id',$category)->get();
         return view('app.category',[
             'categories' => $categories,
             'mostComments' => $mostComments,
             'banner' => $banner,
             'posts' => $posts
         ]);
    }
    public function post($post)
    {
        return $post;
    }
}
