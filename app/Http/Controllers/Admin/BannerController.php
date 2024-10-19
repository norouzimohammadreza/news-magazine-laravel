<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Banner\BannerStoreRequest;
use App\Http\Requests\Api\Admin\Banner\BannerUpdateRequest;
use App\Models\Banner;
use App\Services\Admin\BannerService;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(private BannerService $bannerService)
    {
    }

    public function index()
    {
        $result = $this->bannerService->ListsBanners();
        return view('admin.banner.index', [
            'banners' => $result->data
        ]);
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(BannerStoreRequest $bannerStoreRequest)
    {
        $this->bannerService->createBanner($bannerStoreRequest);
        return redirect('admin/banner');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', [
            'banner' => $banner
        ]);
    }

    public function update(BannerUpdateRequest $bannerUpdateRequest, Banner $banner)
    {
        $this->bannerService->updateBanner($bannerUpdateRequest, $banner);
        return redirect('admin/banner');
    }

    public function destroy(Banner $banner)
    {
        $this->bannerService->deleteBanner($banner);
        return redirect('admin/banner');
    }
}
