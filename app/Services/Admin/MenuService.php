<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Http\Requests\Api\Admin\Menu\MenuStoreRequest;
use App\Http\Requests\Api\Admin\Menu\MenuUpdateRequest;
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
    public function createMenu(MenuStoreRequest $menuStoreRequest) : ServiceResult
    {

        Menu::create([
            'title'=> $menuStoreRequest['title'],
            'url'=> $menuStoreRequest['url'],
            'parent_id'=> ($menuStoreRequest['parent_id']==0)?null:$menuStoreRequest['parent_id'],

        ]);
        return new ServiceResult(true);
    }
    public function showMenu(Menu $menu) : ServiceResult
    {
        return new ServiceResult(true,new MenuDetailesApiResources($menu));
    }
    public function updateMenu(MenuUpdateRequest $menuUpdateRequest,Menu $menu) : ServiceResult
    {
        $menu->update([
            'title'=> $menuUpdateRequest['title'],
            'url'=> $menuUpdateRequest['url'],
            'parent_id'=> ($menuUpdateRequest['parent_id']==0)?null:$menuUpdateRequest['parent_id'],
        ]);
        return new ServiceResult(true);
    }
    public function deleteMenu(Menu $menu) : ServiceResult
    {
        $menu->delete();
        return new ServiceResult(true);

    }

}
