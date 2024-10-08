<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Services\Admin\AdminDashboardServices;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function __construct(private AdminDashboardServices $adminDashboardServices)
    {

    }
    public function index()
    {
        //for components
    $result = $this->adminDashboardServices->getDashboardData();
    $result = $result->data;
       return view('admin.index',[
          'categoriesCount' => $result['categoriesCount'],
           'adminsCount' => $result['adminsCount'],
           'usersCount'=>$result['usersCount'],
           'views' => $result['views'],
           'postsCount' => $result['postsCount'],
           'commentsCount'=> $result['commentsCount'],
           'unseenComments'=>$result['unseenComments'],
           'approvedComments'=>$result['approvedComments'],
           'mostViewsPosts'=> $result['mostViewsPosts'],
           'mostCommentsPosts'=> $result['mostCommentsPosts'],
           'mostCommentsUsers'=>$result['mostCommentsUsers'],
       ]);
    }
}
