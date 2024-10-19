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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $result = $this->bannerService->ListsBanners();
        return Response::withData($result->data)->build()->response();

    }

    /**
     * BannerStoreRequest a newly created resource in storage.
     */
    public function store(BannerStoreRequest $bannerStoreRequest)
    {

        $this->bannerService->createBanner($bannerStoreRequest->validated());
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
     * BannerUpdateRequest the specified resource in storage.
     */
    public function update(BannerUpdateRequest $bannerUpdateRequest, Banner $banner)
    {

        $this->bannerService->updateBanner($bannerUpdateRequest->validated(), $banner);
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
