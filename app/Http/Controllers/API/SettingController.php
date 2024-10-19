<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\RestfulApi\Facade\Response;
use App\Services\Admin\SettingService;

class SettingController extends Controller
{
    public function __construct(private SettingService $settingService)
    {

    }

    public function index()
    {
        $result = $this->settingService->showSetting();
        return Response::withData($result->data)->build()->response();
    }

    public function update(\App\Http\Requests\Api\Admin\Setting\SettingRequest $update, Setting $setting)
    {
        $this->settingService->setSetting($update, $setting);
        return Response::withMessage('SettingRequest is set.')->build()->response();

    }

}
