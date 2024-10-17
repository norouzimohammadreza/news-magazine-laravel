<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Http\Resources\API\Admin\Menus\MenuDetailesApiResources;
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
    public function showMenu(Menu $menu) : ServiceResult
    {
        return new ServiceResult(true,new MenuDetailesApiResources($menu));
    }
    public function updateMenu($update,Menu $menu) : ServiceResult
    {
        $menu->update([
            'title'=> $update->title,
            'url'=> $update->url,
            'parent_id'=> ($update->parent_id==0)?null:$update->parent_id
        ]);
        return new ServiceResult(true);
    }

}
