<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Services\AppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct(private AppService $appService)
    {
    }
    public function index(){

       $result = $this->appService->mainPage();
       $data = $result->data;

        return view('app.index',[
            'categories' => $this->appService->categories,
            'topSelectedPosts' => $data['topSelectedPosts'],
            'breakingNews' => $data['breakingNews'],
            'latestPosts' => $data['latestPosts'],
            'popularPosts' => $data['popularPosts'],
            'mostComments' => $this->appService->mostComments,
            'banner' => $this->appService->banner
        ]);
    }
    public function category(Category $category)
    {
        $result = $this->appService->categoryPage($category);
        return view('app.category',[
             'categories' => $this->appService->categories,
             'mostComments' => $this->appService->mostComments,
             'banner' => $this->appService->banner,
             'posts' => $result->data,
             'category' => Category::find($category->id)->title
         ]);

    }
    public function post($post)
    {
        $article = Post::where('id',$post)->first();
        $article->view+=1;
        $article->save();
        $comments= Comment::where('post_id',$post)->where('status','approved')->get();
        return view('app.post',[
            'categories' => $this->appService->categories,
            'mostComments' => $this->appService->mostComments,
            'banner' => $this->appService->banner,
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
