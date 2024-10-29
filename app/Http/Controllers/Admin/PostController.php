<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Post\PostStoreRequest;
use App\Http\Requests\Api\Admin\Post\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\Admin\PostServices;

class PostController extends Controller
{

    public function __construct(private PostServices $postServices)
    {
    }

    public function index()
    {
        $result = $this->postServices->getPosts();
        $posts = $result->data;
        return view('admin.post.index', [
            'posts' => $posts
        ]);
    }

    public function isSelected(Post $post)
    {
        $this->postServices->isSelected($post);
        return redirect()->back();
    }

    public function breakingNews(Post $post)
    {
        $this->postServices->breakingNews($post);
        return redirect()->back();
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', [
            'categories' => $categories
        ]);
    }

    public function store(PostStoreRequest $request)
    {
        $this->postServices->createPost($request);
        return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.post.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        $this->postServices->updatePost($request, $post);
        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        $this->postServices->deletePost($post);
        return redirect()->route('post.index');
    }
}
