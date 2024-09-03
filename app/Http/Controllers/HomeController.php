<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Comment;
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
            ->groupBy('posts.id')
            ->where('category_id',$category)->get();

       if ($posts){
         return view('app.category',[
             'categories' => $categories,
             'mostComments' => $mostComments,
             'banner' => $banner,
             'posts' => $posts,
             'category' => Category::find($category)->title
         ]);
       }else{
           return redirect()->route('home');
       }
    }
    public function post($post)
    {
        $categories = Category::all();
        $mostComments = Post::select('posts.*',DB::raw('COUNT(comments.post_id) as comments'))
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->groupBy('posts.id')
            ->orderBy('comments', 'DESC')
            ->limit(3)
            ->get();
        $banner = Banner::first();
        $article = Post::where('id',$post)->first();
        $article->view+=1;
        $article->save();
        $comments= Comment::where('post_id',$post)->where('status','approved')->get();
        return view('app.post',[
            'categories' => $categories,
            'mostComments' => $mostComments,
            'banner' => $banner,
            'post' => $article,
            'comments' => $comments
        ]);
    }
    public function comment($post,\App\Http\Requests\Comment $comment)
    {

        Comment::create([
            'body'=> $comment->body,
            'post_id' => $post,
            'user_id' => auth()->user()->id
        ]);
       return redirect()->back()->with('password','کامنت شما ثبت و پس از تایید به نمایش در خواهد امد.');
    }
}
