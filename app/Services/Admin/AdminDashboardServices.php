<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Debug\ExceptionHandler;

class AdminDashboardServices
{
    public function getDashboardData(): ServiceResult
    {
        try {
            $categoriesCount = Category::all()->count();
            $adminsCount = User::AdminUser()->count();
            $usersCount = User::NotAdminUser()->count();
            $postsCount = Post::count();
            $views = Post::sum('view');
            $commentsCount = Comment::count();
            $unseenComments = Comment::UnseenComments()->count();
            $approvedComments = Comment::where('status', '=', 'approved')->count();
            //for tables
            $mostViewsPosts = Post::orderByDesc('view')->limit(3)->get();
            $mostCommentsPosts = Post::withCount('comment')
                ->orderBy('comment_count', 'DESC')->limit(3)->get();
            $mostCommentsUsers = User::withCount('comment')->orderBy('comment_count', 'DESC')->limit(3)->get();
        } catch (\Throwable $th) {
            app()[ExceptionHandler::class]->report($th);
            return new ServiceResult(false, $th->getMessage());
        }
        return new ServiceResult(true, [
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
