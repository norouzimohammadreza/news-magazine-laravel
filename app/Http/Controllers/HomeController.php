<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment;
use App\Models\Category;
use App\Models\Post;
use App\Services\AppService;


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
    public function post(Post $post)
    {
        $result = $this->appService->showPost($post);
        $data = $result->data;
        return view('app.post',[
            'categories' => $this->appService->categories,
            'mostComments' => $this->appService->mostComments,
            'banner' => $this->appService->banner,
            'post' => $data['article'],
            'comments' => $data['comments'],
        ]);
    }
    public function comment($post,Comment $comment)
    {
        $this->appService->comment($post,$comment->all());
       return redirect()->back()->with('password','کامنت شما ثبت و پس از تایید به نمایش در خواهد امد.');
    }
}
