<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\App\AddCommentRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\AppService;


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

    public function comment(Post $post, AddCommentRequest $request)
    {
        $this->appService->comment($post, $request);
        return redirect()->back()->with('password', __('comment.add'));
    }

    public function changeLang($lang)
    {
        $this->appService->setLanguage($lang);
        return redirect()->back();
    }

    public function about()
    {
        $result = $this->appService->aboutUs();
        $data = $result->data;
        return view('app.about-us', [
            'banner' => $data['banner'],
            'categories' => $data['categories'],
            'mostComments' => $data['mostComments'],
        ]);
    }
    public function contact()
    {
        $result = $this->appService->contactUS();
        $data = $result->data;
        return view('app.contact-us', [
            'banner' => $data['banner'],
            'categories' => $data['categories'],
            'mostComments' => $data['mostComments'],
        ]);
    }
}
