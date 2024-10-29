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

    public function setSetting(SettingRequest $request, Setting $setting): ServiceResult
    {
        $validatedRequest = $request->validated();
        if (isset($validatedRequest['logo']) && $validatedRequest['logo']->isValid()) {
            $logoFormat = $validatedRequest['logo']->extension();
            $logo = 'logo' . '.' . $logoFormat;
            $validatedRequest['logo']->move(public_path('setting'), $logo);
        }
        if (isset($validatedRequest['icon']) && $validatedRequest['icon']->isValid()) {
            $iconFormat = $validatedRequest['icon']->extension();
            $icon = 'icon' . '.' . $iconFormat;
            $validatedRequest['icon']->move(public_path('setting'), $icon);
        }
        $setting->update([
            'title' => $validatedRequest['title'],
            'description' => $validatedRequest['description'],
            'keyword' => $validatedRequest['keyword'],
            'logo' => (isset($validatedRequest['logo'])) ? $logo : $setting->logo,
            'icon' => (isset($validatedRequest['icon'])) ? $icon : $setting->icon
        ]);
        return new ServiceResult(true);
    }
}
