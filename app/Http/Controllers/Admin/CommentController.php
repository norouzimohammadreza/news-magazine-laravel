<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comment.index',[
            'comments'=>$comments
        ]);
    }
    public function change(Comment $comment) {

        if($comment->status=='unseen'||$comment->status=='seen'){
            $comment->status='approved';
        }else{
            $comment->status='seen';
        }

        Comment::where('id',$comment->id)->update([
            'status'=>$comment->status
        ]);
        return redirect()->back();
    }

}
