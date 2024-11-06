<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Post\PostStoreRequest;
use App\Http\Requests\Api\Admin\Post\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\Admin\PostServices;
use RealRashid\SweetAlert\Facades\Alert;

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
        Alert::success(__('alert.alerts.create',['name'=>'Post'])
            ,__('alert.alerts.create_msg',['name'=>'Post']));
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
        Alert::success(__('alert.alerts.update',['name'=>'Post'])
            ,__('alert.alerts.update_msg',['name'=>'Post']));
        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        $this->postServices->deletePost($post);
        Alert::success(__('alert.alerts.delete',['name'=>'Post'])
            ,__('alert.alerts.delete_msg',['name'=>'Post']));
        return redirect()->route('post.index');
    }
}
