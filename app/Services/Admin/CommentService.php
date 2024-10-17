<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Http\Resources\API\Admin\Comment\CommentListApiResource;
use App\Models\Comment;

class CommentService
{
    public function getComments(): ServiceResult
    {
        $comments = Comment::all();
        return new ServiceResult(200, CommentListApiResource::collection($comments));
    }

    public function change(Comment $comment): ServiceResult
    {
        if ($comment->status == 'unseen' || $comment->status == 'seen') {
            $comment->status = 'approved';
        } else {
            $comment->status = 'seen';
        }
        $comment->update();
        return new ServiceResult(200);
    }

}
