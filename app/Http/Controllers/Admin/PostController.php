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

        if ($post->selected){
            $post->selected=0;
        }else{
            $post->selected=1;
        }

        Post::where('id','=',$post->id)->update([
            'selected' => $post->selected
        ]);
        return redirect()->back();
    }
    public function breakingNews(Post $post)
    {
        if ($post->breaking_news){
            $post->breaking_news=0;
        }else{
            $post->breaking_news=1;
        }
        Post::where('id','=',$post->id)->update([
            'breaking_news' => $post->breaking_news
        ]);
        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create',[
            'categories'=> $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(store $store)
    {
        $this->postServices->createPost($store->all());
        return redirect('admin/post');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.post.edit',[
            'post'=>$post,
            'categories'=> $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(update $update, Post $post)
    {
        $this->postServices->updatePost($update,$post);
        return redirect('admin/post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->postServices->deletePost($post);
        return redirect('admin/post');
    }
}
