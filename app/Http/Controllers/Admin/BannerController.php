<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\store;
use App\Http\Requests\Admin\Banner\update;
use App\Models\Banner;
use App\Services\Admin\BannerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.banner.index',[
            'banners'=> $result->data
        ]);
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(store $store)
    {
        $this->bannerService->createBanner($store);
        return redirect('admin/banner');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banner.edit',[
            'banner'=>$banner
        ]);
    }
    public function update(update $update, Banner $banner)
    {
        $this->bannerService->updateBanner($update,$banner);
        return redirect('admin/banner');
    }

    public function destroy(Banner $banner)
    {
        Banner::find($banner->id)->delete();
        Storage::delete('banners/'.$banner->image);
        return redirect('admin/banner');
    }
}
