<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Http\Resources\API\Admin\Banners\BannerDetailesApiResource;
use App\Http\Resources\API\Admin\Banners\BannersListApiResources;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;


class BannerService
{

    public function ListsBanners(): ServiceResult
    {
        $banners = Banner::all();
        return new ServiceResult(true, BannersListApiResources::collection($banners));
    }

    public function createBanner($store): ServiceResult
    {
        $imageName = time() . '.' . $store->file('image')->extension();
        $store->file('image')->storeAs(('banners'), $imageName);
        Banner::create([
            'url' => $store->url,
            'image' => $imageName
        ]);
        return new ServiceResult(true);
    }

    public function showBanner(Banner $banner): ServiceResult
    {
        return new ServiceResult(true, new BannerDetailesApiResource($banner));
    }

    public function updateBanner($update, Banner $banner): ServiceResult
    {
        if ($update->hasFile('image')) {
            Storage::delete('banners/' . $banner->image);
            $imageName = time() . '.' . $update->file('image')->extension();
            $update->file('image')->storeAs(('banners'), $imageName);
        }
        Banner::where('id', $banner->id)->update([
            'url' => $update->url,
            'image' => ($update->hasFile('image')) ? $imageName : $banner->image
        ]);
        return new ServiceResult(true);
    }

    public function deleteBanner(Banner $banner): ServiceResult
    {
        Banner::find($banner->id)->delete();
        Storage::delete('banners/' . $banner->image);
        return new ServiceResult(true);

    }


}
