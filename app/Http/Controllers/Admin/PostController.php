<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\store;
use App\Http\Requests\Admin\Post\update;
use App\Models\Category;
use App\Models\Post;
use App\Services\Admin\PostServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(private PostServices $postServices)
    {
    }
    public function index()
    {
        $result = $this->postServices->getPosts();
        $posts = $result->data->all();
        return view('admin.post.index',[
            'posts'=>$posts
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
        return view('admin.post.create',[
            'categories'=> $categories
        ]);
    }

    public function store(store $store)
    {
        $this->postServices->createPost($store->all());
        return redirect('admin/post');

    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.post.edit',[
            'post'=>$post,
            'categories'=> $categories
        ]);
    }

    public function update(update $update, Post $post)
    {
        $this->postServices->updatePost($update,$post);
        return redirect('admin/post');
    }

    public function destroy(Post $post)
    {
        $this->postServices->deletePost($post);
        return redirect('admin/post');
    }
}
