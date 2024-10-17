<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Menu\Store;
use App\Http\Requests\Api\Admin\Menu\Update;
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
        return view('admin.menu.index', [
            'menus' => $result->data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::all();
        return view('admin.menu.create', [
            'menus' => $menus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $store)
    {
        //dd($store->all());
        $this->menuService->createMenu($store);
        return redirect('admin/menu');
    }


    public function edit(Menu $menu)
    {
        $menus = Menu::all();
        return view('admin.menu.edit', [
            'menu' => $menu,
            'menus' => $menus
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $update, Menu $menu)
    {
        $this->menuService->updateMenu($update, $menu);
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
