<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
