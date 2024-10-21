<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Http\Requests\Api\Admin\Setting\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingService
{
    public function showSetting(): ServiceResult
    {
        $setting = Setting::first();
        return new ServiceResult(true, $setting);

    }

    public function setSetting(SettingRequest $settingRequest, Setting $setting): ServiceResult
    {
        if ($settingRequest->hasFile('logo') && $settingRequest->file('logo')->isValid()) {
            $logoFormat = $settingRequest->file('logo')->extension();
            $logo = 'logo' . '.' . $logoFormat;
            $settingRequest->file('logo')->move(public_path('setting'), $logo);
        }
        if ($settingRequest->hasFile('icon') && $settingRequest->file('icon')->isValid()) {
            $iconFormat = $settingRequest->file('icon')->extension();
            $icon = 'icon' . '.' . $iconFormat;
            $settingRequest->file('icon')->move(public_path('setting'), $icon);
        }
        $setting->update([
            'title' => $settingRequest->title,
            'description' => $settingRequest->description,
            'keyword' => $settingRequest->keyword,
            'logo' => $settingRequest->hasFile('logo') ? $logo : $setting->logo,
            'icon' => $settingRequest->hasFile('icon') ? $icon : $setting->icon
        ]);
        return new ServiceResult(true);
    }
}
