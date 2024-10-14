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
        $validation = Validator::make($request->all(), [
            'title' => 'min:5|max:100'
        ]);
        if ($validation->fails()) {
            return response()->json([
                'message' => $validation->errors()
            ]);
        }
        $input = $validation->validated();
        $input['user_id'] =1;
        $input['category_id'] =2;
        $input['image'] ='perspolis.jpg';
        $input['published_at'] ='2024-08-29 07:37:08';
        $post->update($input);
        return response()->json([
            'message' => 'Post updated successfully'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'message' => 'Post deleted successfully'
        ]);
    }
}
