<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Banner\BannerStoreRequest;
use App\Http\Requests\Api\Admin\Banner\BannerUpdateRequest;
use App\Models\Banner;
use App\Services\Admin\BannerService;


class BannerController extends Controller
{
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

    public function store(BannerStoreRequest $request)
    {
        $this->bannerService->createBanner($request);
        return redirect()->route('banner.index');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', [
            'banner' => $banner
        ]);
    }

    public function update(BannerUpdateRequest $request, Banner $banner)
    {
        $this->bannerService->updateBanner($request, $banner);
        return redirect()->route('banner.index');
    }

    public function destroy(Banner $banner)
    {
        $this->bannerService->deleteBanner($banner);
        return redirect()->route('banner.index');
    }
}
