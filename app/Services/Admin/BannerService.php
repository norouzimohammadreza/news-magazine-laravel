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

    public function createBanner(array $validatedRequest): ServiceResult
    {
        $imageName = time() . '.' . $validatedRequest['image']->extension();
        $validatedRequest['image']->storeAs('banners', $imageName);
        $validatedRequest['image'] = $imageName;
        Banner::create($validatedRequest);
        return new ServiceResult(true);

    }

    public function showBanner(Banner $banner): ServiceResult
    {

        return new ServiceResult(true, new BannerDetailesApiResource($banner));

    }

    public function updateBanner(array $validatedRequest, Banner $banner): ServiceResult
    {

        if (isset($validatedRequest['image'])) {
            Storage::delete('banners/' . $banner->image);
            $imageName = time() . '.' . $validatedRequest['image']->extension();
            $validatedRequest['image']->storeAs('banners', $imageName);
        }

        $banner->update([
            'url' => $validatedRequest['url'],
            'image' => (isset($validatedRequest['image'])) ? $imageName : $banner->image
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
