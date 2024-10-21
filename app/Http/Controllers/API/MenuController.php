<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Menu\MenuStoreRequest;
use App\Http\Requests\Api\Admin\Menu\MenuUpdateRequest;
use App\Models\Menu;
use App\RestfulApi\Facade\Response;
use App\Services\Admin\MenuService;

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

        $result = $this->menuService->getListsMenus();
        return Response::withData($result->data)->build()->response();

    }

    /**
     * BannerStoreRequest a newly created resource in storage.
     */
    public function store(MenuStoreRequest $menuStoreRequest)
    {

        $this->menuService->createMenu($menuStoreRequest);
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
     * BannerUpdateRequest the specified resource in storage.
     */
    public function update(MenuUpdateRequest $menuUpdateRequest, Menu $menu)
    {

        $this->menuService->updateMenu($menuUpdateRequest, $menu);
        return Response::withMessage('Menu updated successfully.')->build()->response();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {

        $this->menuService->deleteMenu($menu);
        return Response::withMessage('Menu deleted successfully.')->build()->response();

    }

}
