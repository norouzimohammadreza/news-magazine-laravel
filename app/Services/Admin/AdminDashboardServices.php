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
            $mostCommentsPosts = Post::withCount('comment')
                ->where('published_at','<',now())
                ->orderBy('comment_count', 'DESC')->limit(3)->get();
            $mostCommentsUsers = User::withCount('comment')->orderBy('comment_count', 'DESC')->limit(3)->get();
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
