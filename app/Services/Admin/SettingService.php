<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingService
{
    public function showSetting(): ServiceResult
    {
        $setting = Setting::first();
        return new ServiceResult(true, $setting);

    }

    public function setSetting(Request $request, Setting $setting): ServiceResult
    {
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $logoFormat = $request->file('logo')->extension();
            $logo = 'logo' . '.' . $logoFormat;
            $request->file('logo')->move(public_path('setting'), $logo);
        }
        if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
            $iconFormat = $request->file('icon')->extension();
            $icon = 'icon' . '.' . $iconFormat;
            $request->file('icon')->move(public_path('setting'), $icon);
        }
        $setting->update([
            'title' => $request->title,
            'description' => $request->description,
            'keyword' => $request->keyword,
            'logo' => $request->hasFile('logo') ? $logo : $setting->logo,
            'icon' => $request->hasFile('icon') ? $icon : $setting->icon
        ]);
        return new ServiceResult(true);
    }
}
