<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting.index',[
            'setting' => $setting
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function edit(Setting $setting)
    {
        $setting = Setting::first();
        return view('admin.setting.edit',[
            'setting' => $setting
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(update $update, Setting $setting)
    {

        if ($update->hasFile('logo') && $update->file('logo')->isValid()) {
            $logoFormat = $update->file('logo')->extension();
            $logo = 'logo' . '.' . $logoFormat;
            $update->file('logo')->move(public_path('setting'), $logo);
        }
        if ($update->hasFile('icon') && $update->file('icon')->isValid()) {
            $iconFormat = $update->file('icon')->extension();
            $icon = 'icon'.'.'.$iconFormat;
            $update->file('icon')->move(public_path('setting'), $icon);
        }
        Setting::first()->update([
            'title' => $update->title,
            'description' => $update->description,
            'keyword' => $update->keyword,
            'logo' =>$update->hasFile('logo')?$logo:$setting->logo,
            'icon' =>$update->hasFile('icon')?$icon:$setting->icon

        ]);
        return redirect('admin/setting');
    }

}
