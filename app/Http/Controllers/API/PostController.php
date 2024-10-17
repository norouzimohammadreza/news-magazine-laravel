<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Post\Store;
use App\Http\Requests\Api\Admin\Post\Update;
use App\Models\Post;
use App\RestfulApi\Facade\Response;
use App\Services\Admin\PostServices;


class PostController extends Controller
{

    public function __construct(private PostServices $postServices)
    {
    }

    public function index()
    {
        $result = $this->postServices->getPosts();
        return Response::withData($result->data)->build()->response();
    }

    public function isSelected(Post $post)
    {
        $this->postServices->isSelected($post);
        return Response::withMessage('Post selected state is changed.')->build()->response();
    }

    public function breakingNews(Post $post)
    {
        $this->postServices->breakingNews($post);
        return Response::withData('Post breaking news state is changed.')->build()->response();
    }

    public function store(Store $request)
    {
        $this->postServices->createPost($request->all());
        return Response::withMessage('Post created successfully')->build()->response();

    }

    public function show(Post $post)
    {
        $result = $this->postServices->getPost($post);
        return Response::withData($result->data)->build()->response();
    }

    public function update(Update $request, Post $post)
    {
        $this->postServices->updatePost($request, $post);
        return Response::withMessage('Post updated successfully')->build()->response();

    }

    public function destroy(Post $post)
    {
        $this->postServices->deletePost($post);
        return Response::withMessage('Post deleted successfully')->build()->response();
    }
}
