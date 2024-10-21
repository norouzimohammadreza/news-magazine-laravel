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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $menus = Menu::get();
        return view('admin.menu.create', [
            'menus' => $menus
        ]);

    }

    /**
     * BannerStoreRequest a newly created resource in storage.
     */
    public function store(MenuStoreRequest $menuStoreRequest)
    {

        $this->menuService->createMenu($menuStoreRequest);
        return redirect('admin/menu');

    }


    public function edit(Menu $menu)
    {

        $menus = Menu::get();
        return view('admin.menu.edit', [
            'menu' => $menu,
            'menus' => $menus
        ]);

    }

    /**
     * BannerUpdateRequest the specified resource in storage.
     */
    public function update(MenuUpdateRequest $menuUpdateRequest, Menu $menu)
    {

        $this->menuService->updateMenu($menuUpdateRequest, $menu);
        return redirect('admin/menu');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {

        $this->menuService->deleteMenu($menu);
        return redirect('admin/menu');

    }
}
