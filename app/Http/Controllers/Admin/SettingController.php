<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Setting\SettingRequest;
use App\Models\Setting;
use App\Services\Admin\SettingService;


class SettingController extends Controller
{

    public function __construct(private SettingService $settingService)
    {
    }

    public function index()
    {

        $result = $this->settingService->showSetting();
        $setting = $result->data;
        return view('admin.setting.index', [
            'setting' => $setting
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */

    public function edit(Setting $setting)
    {

        return view('admin.setting.edit', [
            'setting' => $setting
        ]);

    }

    /**
     * BannerUpdateRequest the specified resource in storage.
     */
    public function update(SettingRequest $settingRequest, Setting $setting)
    {

        $this->settingService->setSetting($settingRequest, $setting);
        return redirect()->route('setting.index');

    }

}
