<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Banner\BannerStoreRequest;
use App\Http\Requests\Api\Admin\Banner\BannerUpdateRequest;
use App\Models\Banner;
use App\RestfulApi\Facade\Response;
use App\Services\Admin\BannerService;

class BannerController extends Controller
{
    public function __construct(private BannerService $bannerService)
    {
    }

    public function index()
    {
        $result = $this->bannerService->ListsBanners();
        return Response::withData($result->data)->build()->response();
    }

    public function store(BannerStoreRequest $request)
    {
        $this->bannerService->createBanner($request);
        return Response::withMessage('Banner created successfully')->build()->response();
    }

    public function show(Banner $banner)
    {
        $result = $this->bannerService->showBanner($banner);
        return Response::withData($result->data)->build()->response();
    }

    public function update(BannerUpdateRequest $request, Banner $banner)
    {
        $this->bannerService->updateBanner($request, $banner);
        return Response::withMessage('Banner updated successfully')->build()->response();
    }

    public function destroy(Banner $banner)
    {
        $this->bannerService->deleteBanner($banner);
        return Response::withMessage('Banner deleted successfully')->build()->response();
    }
}
