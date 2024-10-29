<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminDashboardServices;


class AdminDashboardController extends Controller
{
    public function __construct(private AdminDashboardServices $adminDashboardServices)
    {

    }

    public function index()
    {
        $result = $this->adminDashboardServices->getDashboardData();
        $result = $result->data;

        return view('admin.index', [
            'categoriesCount' => $result['categoriesCount'],
            'adminsCount' => $result['adminsCount'],
            'usersCount' => $result['usersCount'],
            'views' => $result['views'],
            'postsCount' => $result['postsCount'],
            'commentsCount' => $result['commentsCount'],
            'unseenComments' => $result['unseenComments'],
            'approvedComments' => $result['approvedComments'],
            'mostViewsPosts' => $result['mostViewsPosts'],
            'mostCommentsPosts' => $result['mostCommentsPosts'],
            'mostCommentsUsers' => $result['mostCommentsUsers'],
        ]);
    }
}
