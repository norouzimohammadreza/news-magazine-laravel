<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\App\AddCommentRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\AppService;
use Illuminate\Support\Facades\App;


class HomeController extends Controller
{
    public function __construct(private AppService $appService)
    {
    }

    public function index()
    {

        $result = $this->appService->mainPage();
        $data = $result->data;

        return view('app.index', [
            'banner' => $data['banner'],
            'categories' => $data['categories'],
            'mostComments' => $data['mostComments'],
            'topSelectedPosts' => $data['topSelectedPosts'],
            'breakingNews' => $data['breakingNews'],
            'latestPosts' => $data['latestPosts'],
            'popularPosts' => $data['popularPosts'],
        ]);
    }

    public function category(Category $category)
    {
        $result = $this->appService->categoryPage($category);
        $data = $result->data;
        return view('app.category', [
            'banner' => $data['banner'],
            'categories' => $data['categories'],
            'mostComments' => $data['mostComments'],
            'posts' => $data['posts'],
            'category' => Category::find($category->id)->title
        ]);

    }

    public function post(Post $post)
    {
        $result = $this->appService->showPost($post);
        $data = $result->data;
        return view('app.post', [
            'banner' => $data['banner'],
            'categories' => $data['categories'],
            'mostComments' => $data['mostComments'],
            'post' => $data['post'],
            'comments' => $data['comments'],
        ]);
    }

    public function comment($post, AddCommentRequest $addCommentRequest)
    {
        $this->appService->comment($post, $addCommentRequest->validated());
        return redirect()->back()->with('password', 'کامنت شما ثبت و پس از تایید به نمایش در خواهد امد.');
    }
    public function changeLang($lang)
    {
       $this->appService->setLanguage($lang);
        return redirect()->back();
    }
    public function lang()
    {
        dd(App::currentLocale());
    }
}
