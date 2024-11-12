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
        if (isset($validatedRequest['logo'])) {
            $logoName = 'logo' . '.' . $validatedRequest['logo']->extension();
            $validatedRequest['logo']->move(public_path('setting'), $logoName);
        }
        if (isset($validatedRequest['icon'])) {
            $iconName = 'icon' . '.' . $validatedRequest['icon']->extension();
            $validatedRequest['icon']->move(public_path('setting'), $iconName);
        }
        $setting->update([
            'title' => $validatedRequest['title'],
            'description' => $validatedRequest['description'],
            'keyword' => $validatedRequest['keyword'],
            'logo' => (isset($validatedRequest['logo'])) ? $logoName : $setting->logo,
            'icon' => (isset($validatedRequest['icon'])) ? $iconName : $setting->icon
        ]);
        return new ServiceResult(true);
    }
}
