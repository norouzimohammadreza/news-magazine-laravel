<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Http\Resources\API\Admin\Posts\PostDetailsApiResource;
use App\Http\Resources\API\Admin\Posts\PostsListApiResource;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostServices
{
    public function getPosts():ServiceResult{
        $posts = Post::all();
        return new ServiceResult(true, PostsListApiResource::collection($posts));
    }
    public function createPost(array $store):ServiceResult{
        $realTimeStamp = substr($store['published_at'], 0, 10);
        $imageName= time() .'.'. $store['image']->extension();
        $store['image']->storeAs(('posts'),$imageName);
        //dd($store->all());
        Post::create([
            'title' => $store['title'],
            'summary' => $store['summary'],
            'body' => $store['body'],
            'published_at' =>  date('Y-m-d H:i:s', (int)$realTimeStamp),
            'category_id' => $store['category_id'],
            'image' => $imageName,
            'user_id' => auth()->user()->id,
        ]);
        return new ServiceResult(true);
    }
    public function getPost(Post $post):ServiceResult{
        return new ServiceResult(true,new PostDetailsApiResource($post));
    }
    public function updatePost(mixed $update, Post $post):ServiceResult{
        $realTimeStamp = substr($update['published_at'], 0, 10);
        if($update->hasFile('image')){
            Storage::delete('posts/'.$post->image);
            $imageName= time() .'.'. $update->file('image')->extension();
            $update->file('image')->storeAs(('posts'),$imageName);
        }
        Post::where('id',$post->id)->update([
            'title' => $update->title,
            'summary' => $update->summary,
            'body' => $update->body,
            'published_at' =>  date('Y-m-d H:i:s', (int)$realTimeStamp),
            'category_id' => $update->category_id,
            'image' => $update->hasFile('image')?$imageName:$post->image
        ]);
        return new ServiceResult(true);
    }
    public function deletePost(Post $post):ServiceResult{
        Storage::delete('posts/'.$post->image);
        Post::destroy($post->id);
        return new ServiceResult(true);
    }
    public function isSelected(Post $post) :serviceResult
    {
        if ($post->selected){
            $post->selected=0;
        }else{
            $post->selected=1;
        }
        $post->update();
        return new ServiceResult(true);
    }
    public function breakingNews(Post $post):ServiceResult
    {
        if ($post->breaking_news){
            $post->breaking_news=0;
        }else{
            $post->breaking_news=1;
        }
        $post->update();
        return new ServiceResult(true);
    }

}
