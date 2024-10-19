<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Models\Setting;

class SettingService
{
    public function showSetting(): ServiceResult
    {
        $setting = Setting::first();
        return new ServiceResult(true, $setting);

    }

    public function setSetting($update, Setting $setting): ServiceResult
    {
        if ($update->hasFile('logo') && $update->file('logo')->isValid()) {
            $logoFormat = $update->file('logo')->extension();
            $logo = 'logo' . '.' . $logoFormat;
            $update->file('logo')->move(public_path('setting'), $logo);
        }
        if ($update->hasFile('icon') && $update->file('icon')->isValid()) {
            $iconFormat = $update->file('icon')->extension();
            $icon = 'icon' . '.' . $iconFormat;
            $update->file('icon')->move(public_path('setting'), $icon);
        }
        $setting->update([
            'title' => $update->title,
            'description' => $update->description,
            'keyword' => $update->keyword,
            'logo' => $update->hasFile('logo') ? $logo : $setting->logo,
            'icon' => $update->hasFile('icon') ? $icon : $setting->icon
        ]);
        return new ServiceResult(true);
    }
}
