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
        $posts = Post::paginate(2);
        return new ServiceResult(true, PostsListApiResource::collection($posts));
    }

    public function createPost(PostStoreRequest $postStoreRequest): ServiceResult
    {
        $realTimeStamp = substr($postStoreRequest['published_at'], 0, 10);
        $imageName = time() . '.' . $postStoreRequest['image']->extension();
        $postStoreRequest['image']->storeAs(('posts'), $imageName);

        Post::create([
            'title' => $postStoreRequest['title'],
            'summary' => $postStoreRequest['summary'],
            'body' => $postStoreRequest['body'],
            'published_at' => date('Y-m-d H:i:s', (int)$realTimeStamp),
            'category_id' => $postStoreRequest['category_id'],
            'image' => $imageName,
            'user_id' => auth()->user()->id,
        ]);
        return new ServiceResult(true);
    }

    public function getPost(Post $post): ServiceResult
    {
        return new ServiceResult(true, new PostDetailsApiResource($post));
    }

    public function updatePost(PostUpdateRequest $postUpdateRequest, Post $post): ServiceResult
    {
        $realTimeStamp = substr($postUpdateRequest['published_at'], 0, 10);
        if ($postUpdateRequest->hasFile('image')) {
            Storage::delete('posts/' . $post->image);
            $imageName = time() . '.' . $postUpdateRequest->file('image')->extension();
            $postUpdateRequest->file('image')->storeAs(('posts'), $imageName);
        }
        $post->update([
            'title' => $postUpdateRequest->title,
            'summary' => $postUpdateRequest->summary,
            'body' => $postUpdateRequest->body,
            'published_at' => date('Y-m-d H:i:s', (int)$realTimeStamp),
            'category_id' => $postUpdateRequest->category_id,
            'image' => $postUpdateRequest->hasFile('image') ? $imageName : $post->image
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
        $post->update();
        return new ServiceResult(true);
    }

}
