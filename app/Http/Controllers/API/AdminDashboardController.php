<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\RestfulApi\Facade\Response;
use App\Services\Admin\AdminDashboardServices;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct(private AdminDashboardServices $adminDashboardServices)
    {

    }

    public function index()
    {
        $result = $this->adminDashboardServices->getDashboardData();
        if (!$result->success) {
            return Response::withStatus(500)->withData($result->data)->withMessage('wrong')->build()->response();
        }
        return Response::withStatus(200)->withData($result->data)->build()->response();
    }

}
