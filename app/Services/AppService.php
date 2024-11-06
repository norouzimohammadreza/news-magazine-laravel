<?php

namespace App\Services;

use App\Base\ServiceResult;
use App\Http\Requests\Api\App\AddCommentRequest;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class AppService
{
    private $mostComments, $banner, $categories;

    public function mainPage(): ServiceResult
    {

        $topSelectedPosts = Post::published()->visible()
            ->withCount('approvedComments')
            ->orderBy('published_at', 'DESC')
            ->limit(3)
            ->get();

        $breakingNews = Post::published()->visible()
            ->where('breaking_news', 1)
            ->orderBy('published_at', 'DESC')
            ->first();
        $latestPosts = Post::published()->visible()
            ->withCount('approvedComments')
            ->orderBy('published_at', 'DESC')
            ->limit(4)
            ->get();
        $popularPosts = Post::published()->visible()
            ->withCount('approvedComments')
            ->orderBy('view', 'DESC')
            ->limit(3)
            ->get();
        return new ServiceResult(true, [
            'topSelectedPosts' => $topSelectedPosts,
            'breakingNews' => $breakingNews,
            'latestPosts' => $latestPosts,
            'popularPosts' => $popularPosts,
            'categories' => $this->setCategories()->data,
            'mostComments' => $this->setMostComments()->data,
            'banner' => $this->setBanner()->data,
        ]);
    }

    public function categoryPage(Category $category): ServiceResult
    {
        $posts = Post::published()->visible()
            ->withCount('approvedComments')
            ->where('category_id', $category->id)->get();
        return new ServiceResult(true, [
            'posts' => $posts,
            'categories' => $this->setCategories()->data,
            'mostComments' => $this->setMostComments()->data,
            'banner' => $this->setBanner()->data,
        ]);
    }

    public function aboutUs(): ServiceResult
    {
        return new ServiceResult(true, [
            'categories' => $this->setCategories()->data,
            'mostComments' => $this->setMostComments()->data,
            'banner' => $this->setBanner()->data,
        ]);
    }
    public function contactUS(): ServiceResult
    {
        return new ServiceResult(true, [
            'categories' => $this->setCategories()->data,
            'mostComments' => $this->setMostComments()->data,
            'banner' => $this->setBanner()->data,
        ]);
    }

    public function showPost(Post $post): ServiceResult
    {
        $post->published()->visible();
        $post->view += 1;
        $post->save();
        $comments = Comment::ApprovedComments()->where('post_id', $post->id)->get();
        return new ServiceResult(true, [
            'post' => $post,
            'comments' => $comments,
            'categories' => $this->setCategories()->data,
            'mostComments' => $this->setMostComments()->data,
            'banner' => $this->setBanner()->data,
        ]);
    }

    public function comment(Post $post, AddCommentRequest $request)
    {
        $validatedRequest = $request->validated();
        Comment::create([
            'body' => $validatedRequest['body'],
            'post_id' => $post->id,
            'user_id' => Auth::user()->id
        ]);
        return new ServiceResult(true);
    }

    public function setMostComments(): ServiceResult
    {
        $this->mostComments = Post::published()->visible()
            ->withCount('approvedComments')
            ->orderBy('approved_comments_count', 'DESC')->limit(3)->get();
        Cache::put('mostComments', $this->mostComments, 3600);
        return new ServiceResult(true, $this->mostComments);
    }

    public function setCategories(): ServiceResult
    {
        $this->categories = Category::all();
        Cache::put('categories', $this->categories, 3600);
        return new ServiceResult(true, $this->categories);
    }

    public function setBanner(): ServiceResult
    {
        $this->banner = Banner::first();
        Cache::put('banner', $this->banner, 3600);
        return new ServiceResult(true, $this->banner);
    }

    public function setLanguage(string $lang): ServiceResult
    {

        //App::setLocale($lang);
        Session::put('lang', $lang);
        return new ServiceResult(true);

    }

}
