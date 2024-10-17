<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Api\Admin\Banner\Store;
use App\Http\Requests\Api\Admin\Banner\Update;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Post;
use App\RestfulApi\Facade\Response;
use App\Services\Admin\BannerService;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function __construct(private BannerService $bannerService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $result = $this->bannerService->ListsBanners();
        return Response::withData($result->data)->build()->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        $this->bannerService->createBanner($request);
        return Response::withMessage('Banner created successfully')->build()->response();


    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        $result = $this->bannerService->showBanner($banner);
        return Response::withData($result->data)->build()->response();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, Banner $banner)
    {
        $this->bannerService->updateBanner($request, $banner);
        return Response::withMessage('Banner updated successfully')->build()->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $this->bannerService->deleteBanner($banner);
        return Response::withMessage('Banner deleted successfully')->build()->response();
    }
}
