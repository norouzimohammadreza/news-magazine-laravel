<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Banner\BannerStoreRequest;
use App\Http\Requests\Api\Admin\Banner\BannerUpdateRequest;
use App\Models\Banner;
use App\Services\Admin\BannerService;
use RealRashid\SweetAlert\Facades\Alert;


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
        Alert::success(__('alert.alerts.create', ['name' => __('alert.name.banner')])
            , __('alert.alerts.create_msg', ['name' => __('alert.name.banner')]));
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
        Alert::success(__('alert.alerts.update', ['name' => __('alert.name.banner')])
            , __('alert.alerts.update_msg', ['name' => __('alert.name.banner')]));
        return redirect()->route('banner.index');
    }

    public function destroy(Banner $banner)
    {
        $this->bannerService->deleteBanner($banner);
        Alert::success(__('alert.alerts.delete', ['name' => __('alert.name.banner')])
            , __('alert.alerts.delete_msg', ['name' => __('alert.name.banner')]));
        return redirect()->route('banner.index');
    }
}
