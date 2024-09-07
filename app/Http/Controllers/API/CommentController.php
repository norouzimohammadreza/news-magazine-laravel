<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\Admin\Comment\CommentDetailsApiResource;
use App\Http\Resources\API\Admin\Comment\CommentListApiResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return CommentListApiResource::collection($comments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'body' => 'required|min:5'
        ]);
        if($validation->fails()){
            return response()->json($validation->errors());
        }
        $input = $validation->validated();
        $input['user_id'] = 1;
        $input['post_id'] = 1;
        Comment::create($input);
        return response()->json([
            'message' => 'Comment created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return new CommentDetailsApiResource($comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $validation = Validator::make($request->all(),[
            'body' => 'required|min:5'
        ]);
        if($validation->fails()){
            return response()->json($validation->errors());
        }
        $input = $validation->validated();
        $input['user_id'] = 1;
        $input['post_id'] = 1;
        $comment->update($input);
        return response()->json([
            'message' => 'Comment updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json(['message' => 'Comment deleted successfully']);
    }
}
