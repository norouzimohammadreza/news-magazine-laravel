<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Api\Admin\Menu\Store;
use App\Http\Requests\Api\Admin\Menu\Update;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\RestfulApi\Facade\Response;
use App\Services\Admin\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(private MenuService $menuService)
    {
    }
    public function index()
    {
        $result =$this->menuService->getListsMenus();
        return Response::withData($result->data)->build()->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        $this->menuService->createMenu($request);
        return Response::withMessage('Menu created successfully.')->build()->response();

    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        $result = $this->menuService->showMenu($menu);
        return Response::withData($result->data)->build()->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $update, Menu $menu)
    {
        $this->menuService->updateMenu($update, $menu);
        return Response::withMessage('Menu updated successfully.')->build()->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}