<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Setting\SettingRequest;
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

    public function update(SettingRequest $request, Setting $setting)
    {
        $this->settingService->setSetting($request, $setting);
        return Response::withMessage('SettingRequest is set.')->build()->response();
    }

}
