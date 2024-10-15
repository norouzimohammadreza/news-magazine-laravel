<?php

namespace App\Http\Controllers\API;

use App\Http\ApiRequests\Api\Admin\Post\Store;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\RestfulApi\Facade\Response;
use App\Services\Admin\PostServices;
use Illuminate\Http\Request;


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
        return Response::withData($result->data)->build()->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        $this->postServices->createPost($request->all());
        return Response::withMessage('Post created successfully')->build()->response();

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $result = $this->postServices->getPost($post);
        return Response::withData($result->data)->build()->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->postServices->updatePost($request,$post);
        return Response::withMessage('Post updated successfully')->build()->response();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->postServices->deletePost($post);
        return Response::withMessage('Post deleted successfully')->build()->response();
    }
}
