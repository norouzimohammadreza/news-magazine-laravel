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
        $menus = Menu::paginate(2);
        return new ServiceResult(true,MenusListApiResources::collection($menus));
    }
    public function createMenu(array $request) : ServiceResult
    {

        Menu::create([
            'title'=> $request['title'],
            'url'=> $request['url'],
            'parent_id'=> ($request['parent_id']==0)?null:$request['parent_id'],

        ]);
        return new ServiceResult(true);
    }
    public function showMenu(Menu $menu) : ServiceResult
    {
        return new ServiceResult(true,new MenuDetailesApiResources($menu));
    }
    public function updateMenu(array $request,Menu $menu) : ServiceResult
    {
        $menu->update([
            'title'=> $request['title'],
            'url'=> $request['url'],
            'parent_id'=> ($request['parent_id']==0)?null:$request['parent_id'],
        ]);
        return new ServiceResult(true);
    }
    public function deleteMenu(Menu $menu) : ServiceResult
    {
        $menu->delete();
        return new ServiceResult(true);

    }

}
