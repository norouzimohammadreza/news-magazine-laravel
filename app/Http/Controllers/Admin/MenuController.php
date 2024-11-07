<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Menu\MenuStoreRequest;
use App\Http\Requests\Api\Admin\Menu\MenuUpdateRequest;
use App\Models\Menu;
use App\Services\Admin\MenuService;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{
    public function __construct(private MenuService $menuService)
    {
    }

    public function index()
    {
        $result = $this->menuService->getListsMenus();
        $menus = $result->data;
        return view('admin.menu.index', [
            'menus' => $menus
        ]);
    }

    public function create()
    {
        $menus = Menu::get();
        return view('admin.menu.create', [
            'menus' => $menus
        ]);
    }

    public function store(MenuStoreRequest $request)
    {
        $this->menuService->createMenu($request);
        Alert::success(__('alert.alerts.create', ['name' => __('alert.name.menu')])
            , __('alert.alerts.create_msg', ['name' => __('alert.name.menu')]));
        return redirect()->route('menu.index');
    }

    public function edit(Menu $menu)
    {
        $menus = Menu::get();
        return view('admin.menu.edit', [
            'menu' => $menu,
            'menus' => $menus
        ]);
    }

    public function update(MenuUpdateRequest $request, Menu $menu)
    {
        $this->menuService->updateMenu($request, $menu);
        Alert::success(__('alert.alerts.update', ['name' => __('alert.name.menu')])
            , __('alert.alerts.update_msg', ['name' => __('alert.name.menu')]));
        return redirect()->route('menu.index');
    }

    public function destroy(Menu $menu)
    {
        $this->menuService->deleteMenu($menu);
        Alert::success(__('alert.alerts.delete', ['name' => __('alert.name.menu')])
            , __('alert.alerts.delete_msg', ['name' => __('alert.name.menu')]));
        return redirect()->route('menu.index');
    }
}
