<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Http\Resources\API\Admin\Menus\MenusListApiResources;
use App\Models\Menu;

class MenuService
{
    public function getListsMenus() : ServiceResult
    {
        $menus = Menu::all();
        return new ServiceResult(true,MenusListApiResources::collection($menus));
    }
    public function createMenu($store) : ServiceResult
    {
        Menu::create([
            'title'=> $store->title,
            'url'=> $store->url,
            'parent_id'=> ($store->parent_id==0)?null:$store->parent_id

        ]);
        return new ServiceResult(true);
    }

}
