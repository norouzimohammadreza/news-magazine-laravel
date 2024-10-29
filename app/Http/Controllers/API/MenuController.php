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

    public function __construct(private MenuService $menuService)
    {
    }

    public function index()
    {
        $result = $this->menuService->getListsMenus();
        return Response::withData($result->data)->build()->response();
    }

    public function store(MenuStoreRequest $request)
    {
        $this->menuService->createMenu($request);
        return Response::withMessage('Menu created successfully.')->build()->response();
    }

    public function show(Menu $menu)
    {
        $result = $this->menuService->showMenu($menu);
        return Response::withData($result->data)->build()->response();
    }

    public function update(MenuUpdateRequest $request, Menu $menu)
    {
        $this->menuService->updateMenu($request, $menu);
        return Response::withMessage('Menu updated successfully.')->build()->response();
    }

    public function destroy(Menu $menu)
    {
        $this->menuService->deleteMenu($menu);
        return Response::withMessage('Menu deleted successfully.')->build()->response();
    }

}
