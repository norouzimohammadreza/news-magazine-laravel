<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\DB;

class AdminDashboardServices
{
    public function getDashboardData():ServiceResult{
        try {
            $categoriesCount = Category::all()->count();
            $adminsCount = User::where('is_admin',1)->count();
            $usersCount = User::where('is_admin',0)->count();
            $postsCount = Post::all()->where('published_at','<',now())->count();
            $views = Post::sum('view');
            $commentsCount = Comment::count();
            $unseenComments = Comment::where('status','=','unseen')->count();
            $approvedComments = Comment::where('status','=','approved')->count();
            //for tables
            $mostViewsPosts = Post::where('published_at','<',now())->orderByDesc('view')->limit(3)->get();
            $mostCommentsPosts = Post::select('posts.id', 'posts.title', DB::raw('COUNT(comments.post_id) AS comment_count'))
                ->where('published_at','<',now())
                ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
                ->groupBy('posts.id', 'posts.title')->orderBy('comment_count', 'DESC')->limit(3)->get();
            $mostCommentsUsers = User::select('users.id','users.name',DB::raw('COUNT(comments.user_id) AS comment_count')
                ,DB::raw('COUNT(comments.status) AS status'))
                ->leftJoin('comments','users.id','=','comments.user_id')
                ->groupBy('users.id','users.name')->orderBy('comment_count', 'DESC')->limit(3)->get();
        }catch (\Throwable $th){
            app()[ExceptionHandler::class]->report($th);
            return new ServiceResult(false, $th->getMessage());
        }
        return new ServiceResult(true,[
            'categoriesCount' => $categoriesCount,
            'adminsCount' => $adminsCount,
            'usersCount' => $usersCount,
            'postsCount' => $postsCount,
            'views' => $views,
            'commentsCount' => $commentsCount,
            'unseenComments' => $unseenComments,
            'approvedComments' => $approvedComments,
            'mostViewsPosts' => $mostViewsPosts,
            'mostCommentsPosts' => $mostCommentsPosts,
            'mostCommentsUsers' => $mostCommentsUsers

        ]);
    }
}
