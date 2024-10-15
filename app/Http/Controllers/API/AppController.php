<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
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

    }
}
