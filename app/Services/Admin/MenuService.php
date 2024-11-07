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
        $menus = Menu::paginate(5);
        return new ServiceResult(true,MenusListApiResources::collection($menus));
    }
    public function createMenu(MenuStoreRequest $request) : ServiceResult
    {
        $validatedRequest = $request->validated();
        Menu::create([
            'title'=> $validatedRequest['title'],
            'url'=> $validatedRequest['url'],
            'parent_id'=> ($validatedRequest['parent_id']==0)?null:$validatedRequest['parent_id'],

        ]);
        return new ServiceResult(true);
    }
    public function showMenu(Menu $menu) : ServiceResult
    {
        return new ServiceResult(true,new MenuDetailesApiResources($menu));
    }
    public function updateMenu(MenuUpdateRequest $request,Menu $menu) : ServiceResult
    {
        $validatedRequest = $request->validated();
        $menu->update([
            'title'=> $validatedRequest['title'],
            'url'=> $validatedRequest['url'],
            'parent_id'=> ($validatedRequest['parent_id']==0)?null:$validatedRequest['parent_id'],
        ]);
        return new ServiceResult(true);
    }
    public function deleteMenu(Menu $menu) : ServiceResult
    {
        $menu->delete();
        return new ServiceResult(true);

    }

}
