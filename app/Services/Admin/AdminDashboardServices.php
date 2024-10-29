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
            $categoriesCount = Category::count();
            $adminsCount = User::AdminUser()->count();
            $usersCount = User::NotAdminUser()->count();
            $postsCount = Post::published()->visible()->count();
            $views = Post::published()->visible()->sum('view');
            $commentsCount = Comment::count();
            $unseenComments = Comment::UnseenComments()->count();
            $approvedComments = Comment::ApprovedComments()->count();
            //for tables
            $mostViewsPosts = Post::published()->visible()->orderByDesc('view')->limit(3)->get();
            $mostCommentsPosts = Post::published()->visible()->withCount('approvedComments')
                ->orderBy('approved_comments_count', 'DESC')->limit(3)->get();
            $mostCommentsUsers = User::withCount('approvedComments')
                ->orderBy('approved_comments_count', 'DESC')->limit(3)->get();

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
