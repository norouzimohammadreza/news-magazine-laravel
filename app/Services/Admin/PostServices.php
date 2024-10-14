<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Http\Resources\API\Admin\Posts\PostDetailsApiResource;
use App\Http\Resources\API\Admin\Posts\PostsListApiResource;
use App\Models\Post;

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

}
