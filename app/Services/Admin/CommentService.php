<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Enums\CommentStatusEnum;
use App\Http\Resources\API\Admin\Comment\CommentListApiResource;
use App\Models\Comment;

class CommentService
{
    public function getComments(): ServiceResult
    {
        $comments = Comment::paginate(5);
        return new ServiceResult(true, CommentListApiResource::collection($comments));
    }

    public function change(Comment $comment): ServiceResult
    {
        if ($comment->status_id == CommentStatusEnum::unseen->value || $comment->status_id == CommentStatusEnum::seen->value) {
            $comment->status_id = CommentStatusEnum::approved->value;
            $comment->save();
            return new ServiceResult(true);
        }
        $comment->status_id = CommentStatusEnum::seen->value;
        $comment->save();
        return new ServiceResult(true);
    }

}
