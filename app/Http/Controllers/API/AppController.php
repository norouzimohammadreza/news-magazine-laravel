<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\RestfulApi\Facade\Response;
use App\Services\AppService;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function __construct(private AppService $appService)
    {
    }

    public function index(){

       $result = $this->appService->mainPage();
       return Response::withData($result->data)->build()->response();
    }
    public function category(Category $category)
    {
        $result = $this->appService->categoryPage($category);
        return Response::withData($result->data)->build()->response();
    }
    public function post(Post $post)
    {
        $result = $this->appService->showPost($post);
        return Response::withData($result->data)->build()->response();
    }
    public function comment($post,\App\Http\Requests\Api\Admin\App\Comment $comment)
    {
        $this->appService->comment($post,$comment->all());
        return Response::withMessage('Comment created successfully.')->build()->response();


    }
}
