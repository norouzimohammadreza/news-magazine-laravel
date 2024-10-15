<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Services\Admin\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(private CommentService $commentService)
    {
    }
    public function index()
    {
        $result = $this->commentService->getComments();
        $comments = $result->data;
        return view('admin.comment.index',[
            'comments'=>$comments
        ]);
    }
    public function change(Comment $comment) {

        $this->commentService->change($comment);
        return redirect()->back();
    }

}
