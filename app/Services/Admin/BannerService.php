<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Http\Resources\API\Admin\Banners\BannersListApiResources;
use App\Models\Banner;

class BannerService
{
    public function ListsBanners():ServiceResult
    {
        $banners = Banner::all();
        return new ServiceResult(true,BannersListApiResources::collection($banners));
    }
    public function createBanner($store):ServiceResult
    {
        $imageName= time() .'.'. $store->file('image')->extension();
        $store->file('image')->storeAs(('banners'),$imageName);
        Banner::create([
            'url'=> $store->url,
            'image'=>$imageName
        ]);
        return new ServiceResult(true);
    }

}
