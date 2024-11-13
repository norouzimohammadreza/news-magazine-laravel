<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Enums\PostBreakingNewsEnum;
use App\Enums\PostSelectedEnum;
use App\Http\Requests\Api\Admin\Post\PostStoreRequest;
use App\Http\Requests\Api\Admin\Post\PostUpdateRequest;
use App\Http\Resources\API\Admin\Posts\PostDetailsApiResource;
use App\Http\Resources\API\Admin\Posts\PostsListApiResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostServices
{
    public function getPosts(): ServiceResult
    {
        $posts = Post::paginate(7);
        return new ServiceResult(true, PostsListApiResource::collection($posts));
    }

    public function createPost(PostStoreRequest $request): ServiceResult
    {
        $validatedRequest = $request->validated();
        //fixmeff
        $realTimeStamp = substr($validatedRequest['published_at'], 0, 10);
        $imageName = uniqid() . '.' . $validatedRequest['image']->extension();
        $validatedRequest['image']->storeAs(('posts'), $imageName);
        Post::create([
            'title' => $validatedRequest['title'],
            'summary' => $validatedRequest['summary'],
            'body' => $validatedRequest['body'],
            'published_at' => date('Y-m-d H:i:s', (int)$realTimeStamp),
            'category_id' => $validatedRequest['category_id'],
            'image' => $imageName,
            'user_id' => auth()->user()->id,
        ]);
        return new ServiceResult(true);
    }

    public function getPost(Post $post): ServiceResult
    {
        return new ServiceResult(true, new PostDetailsApiResource($post));
    }

    public function updatePost(PostUpdateRequest $request, Post $post): ServiceResult
    {
        $validatedRequest = $request->validated();
        //fixmef
        $realTimeStamp = substr($validatedRequest['published_at'], 0, 10);
        if (isset($validatedRequest['image'])) {
            Storage::delete('posts/' . $post->image);
            $imageName = uniqid() . '.' . $validatedRequest['image']->extension();
            $validatedRequest['image']->storeAs(('posts'), $imageName);
        }
        $post->update([
            'title' => $validatedRequest['title'],
            'summary' => $validatedRequest['summary'],
            'body' => $validatedRequest['body'],
            'published_at' => date('Y-m-d H:i:s', (int)$realTimeStamp),
            'category_id' => $validatedRequest['category_id'],
            'image' => (isset($validatedRequest['image']))? $imageName : $post->image
        ]);
        return new ServiceResult(true);
    }

    public function deletePost(Post $post): ServiceResult
    {
        Storage::delete('posts/' . $post->image);
        Post::destroy($post->id);
        return new ServiceResult(true);
    }

    public function isSelected(Post $post): serviceResult
    {
        if ($post->selected == PostSelectedEnum::isSelected->value) {
            $post->selected = PostSelectedEnum::notSelected->value;
        } else {
            $post->selected = PostSelectedEnum::isSelected->value;
        }
        $post->save();
        return new ServiceResult(true);
    }

    public function breakingNews(Post $post): ServiceResult
    {
        if ($post->breaking_news == PostBreakingNewsEnum::isBreakingNews->value) {
            $post->breaking_news = PostBreakingNewsEnum::notBreakingNews->value;
        } else {
            $post->breaking_news = PostBreakingNewsEnum::isBreakingNews->value;
        }
        $post->save();
        return new ServiceResult(true);
    }
}
