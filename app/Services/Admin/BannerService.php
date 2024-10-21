<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Http\Requests\Api\Admin\Banner\BannerStoreRequest;
use App\Http\Requests\Api\Admin\Banner\BannerUpdateRequest;
use App\Http\Resources\API\Admin\Banners\BannerDetailesApiResource;
use App\Http\Resources\API\Admin\Banners\BannersListApiResources;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BannerService
{

    public function ListsBanners(): ServiceResult
    {

        $banners = Banner::paginate(1);
        return new ServiceResult(true, BannersListApiResources::collection($banners));

    }

    public function createBanner(BannerStoreRequest $bannerStoreRequest): ServiceResult
    {

        $imageName = time() . '.' . $bannerStoreRequest->file('image')->extension();
        $bannerStoreRequest->file('image')->storeAs('banners', $imageName);
        $bannerStoreRequest = $bannerStoreRequest->validated();
        $bannerStoreRequest['image'] = $imageName;
        Banner::create($bannerStoreRequest);

        return new ServiceResult(true);

    }

    public function showBanner(Banner $banner): ServiceResult
    {

        return new ServiceResult(true, new BannerDetailesApiResource($banner));

    }

    public function updateBanner(BannerUpdateRequest $bannerUpdateRequest, Banner $banner): ServiceResult
    {

        if ($bannerUpdateRequest->hasFile('image')) {
            Storage::delete('banners/' . $banner->image);
            $imageName = time() . '.' . $bannerUpdateRequest->file('image')->extension();
            $bannerUpdateRequest->file('image')->storeAs(('banners'), $imageName);
        }

        $banner->update([
            'url' => $bannerUpdateRequest->url,
            'image' => ($bannerUpdateRequest->hasFile('image')) ? $imageName : $banner->image
        ]);

        return new ServiceResult(true);

    }

    public function deleteBanner(Banner $banner): ServiceResult
    {

        $banner->delete();
        Storage::delete('banners/' . $banner->image);
        return new ServiceResult(true);


    }


}
