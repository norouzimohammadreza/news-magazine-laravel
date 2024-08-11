<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\store;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
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
        $realTimeStamp = substr($store->published_at, 0, 10);
        $imageName= time() .'.'. $store->file('image')->extension();
        $store->file('image')->storeAs(('posts'),$imageName);
        //dd($store->all());
        Post::create([
            'title' => $store->title,
            'summary' => $store->summary,
            'body' => $store->body,
            'published_at' =>  date('Y-m-d H:i:s', (int)$realTimeStamp),
            'category_id' => $store->category_id,
            'image' => $imageName,
            'user_id' => 1,
        ]);

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
