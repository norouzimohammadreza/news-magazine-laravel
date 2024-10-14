<?php

namespace App\Http\Controllers\API;

use App\Http\ApiRequests\Api\Admin\Post\Store;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Auth;
use App\Http\Resources\API\Admin\Posts\PostDetailsApiResource;
use App\Http\Resources\API\Admin\Posts\PostsListApiResource;
use App\Models\Post;
use App\Services\Admin\PostServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        $this->postServices->createPost($request->all());
        return response()->json([
            'message' => 'Post created successfully'
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $result = $this->postServices->getPost($post);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->postServices->updatePost($request,$post);
        return response()->json([
            'message' => 'Post updated successfully'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->postServices->deletePost($post);
        return response()->json([
            'message' => 'Post deleted successfully'
        ]);
    }
}
