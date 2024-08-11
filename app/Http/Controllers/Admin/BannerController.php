<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\store;
use App\Http\Requests\Admin\Banner\update;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index',[
            'banners'=>$banners
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(store $store)
    {
        $imageName= time() .'.'. $store->file('image')->extension();
        $store->file('image')->storeAs(('banners'),$imageName);
        Banner::create([
            'url'=> $store->url,
            'image'=>$imageName
        ]);
        return redirect('admin/banner');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit',[
            'banner'=>$banner
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(update $update, Banner $banner)
    {
        if($update->hasFile('image')){
            Storage::delete('banners/'.$banner->image);
            $imageName= time() .'.'. $update->file('image')->extension();
            $update->file('image')->storeAs(('banners'),$imageName);
        }
        Banner::where('id',$banner->id)->update([
            'url'=>$update->url,
            'image'=> ($update->hasFile('image'))?$imageName:$banner->image
        ]);
        return redirect('admin/banner');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        Banner::find($banner->id)->delete();
        return redirect('admin/banner');
    }
}
