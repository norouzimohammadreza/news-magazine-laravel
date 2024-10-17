<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Menu\store;
use App\Models\Menu;
use App\Services\Admin\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct(private MenuService $menuService)
    {
    }

    public function index()
    {
        $result = $this->menuService->getListsMenus();
        return view('admin.menu.index',[
            'menus' => $result->data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { $menus = Menu::all();
        return view('admin.menu.create',[
            'menus' => $menus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(store $store)
    {
        //dd($store->all());
       Menu::create([
           'title'=> $store->title,
           'url'=> $store->url,
           'parent_id'=> ($store->parent_id==0)?null:$store->parent_id

       ]);
       return redirect('admin/menu');
    }


    public function edit(Menu $menu)
    {
        $menus = Menu::all();
        return view('admin.menu.edit',[
            'menu'=>$menu,
            'menus'=>$menus
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        Menu::find($menu->id)->delete($menu);
        return redirect('admin/menu');
    }
}
