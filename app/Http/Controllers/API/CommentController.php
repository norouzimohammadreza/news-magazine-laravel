<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\Admin\Comment\CommentDetailsApiResource;
use App\Http\Resources\API\Admin\Comment\CommentListApiResource;
use App\Models\Comment;
use App\RestfulApi\Facade\Response;
use App\Services\Admin\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{

    public function __construct(private CommentService $commentService)
    {
    }

    public function index()
    {
        $result = $this->commentService->getComments();
        return Response::withData($result->data)->build()->response();
    }
    public function change(Comment $comment)
    {
        $this->commentService->change($comment);
        return Response::withMessage('Comment visibility is changed successfully.')->build()->response();
    }

    public function show(Comment $comment)
    {
        return Response::withData(new CommentDetailsApiResource($comment))->build()->response();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return Response::withMessage('Comment deleted successfully.')->build()->response();
    }
}