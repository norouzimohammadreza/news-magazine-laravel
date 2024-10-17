<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.setting.index',[
            'setting' => $result->data
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
    public function update(\App\Http\Requests\Api\Admin\Setting\Setting $update, Setting $setting)
    {
        $this->settingService->setSetting($update,$setting);
        return redirect('admin/setting');
    }

}
