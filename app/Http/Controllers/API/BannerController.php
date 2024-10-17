<?php

namespace App\Http\Controllers\API;

use App\Http\ApiRequests\Api\Admin\Banner\Store;
use App\Http\ApiRequests\Api\Admin\Banner\Update;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Post;
use App\Services\Admin\BannerService;
use Illuminate\Http\Request;

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
        return response()->json($result->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        $this->bannerService->createBanner($request);
        return response()->json('Banner created successfully', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        $result = $this->bannerService->showBanner($banner);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, Banner $banner)
    {
        $this->bannerService->updateBanner($request, $banner);
        return response()->json('Banner updated successfully', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
