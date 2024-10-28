<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Menu\MenuStoreRequest;
use App\Http\Requests\Api\Admin\Menu\MenuUpdateRequest;
use App\Models\Menu;
use App\Services\Admin\MenuService;

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

    public function store(MenuStoreRequest $menuStoreRequest)
    {
        $this->menuService->createMenu($menuStoreRequest);
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

    public function update(MenuUpdateRequest $menuUpdateRequest, Menu $menu)
    {
        $this->menuService->updateMenu($menuUpdateRequest, $menu);
        return redirect()->route('menu.index');
    }

    public function destroy(Menu $menu)
    {
        $this->menuService->deleteMenu($menu);
        return redirect()->route('menu.index');
    }
}
