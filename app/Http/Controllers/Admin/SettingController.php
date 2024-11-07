<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Setting\SettingRequest;
use App\Models\Setting;
use App\Services\Admin\SettingService;
use RealRashid\SweetAlert\Facades\Alert;


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

    public function update(SettingRequest $request, Setting $setting)
    {

        $this->settingService->setSetting($request, $setting);
        Alert::success(__('alert.alerts.change', ['name' => __('alert.name.setting')])
            , __('alert.alerts.change_msg', ['name' => __('alert.name.setting')]));
        return redirect()->route('setting.index');

    }

}
