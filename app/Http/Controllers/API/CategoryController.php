<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Category\CategoryStoreRequest;
use App\Http\Requests\Api\Admin\Category\CategoryUpdateRequest;
use App\Models\Category;
use App\RestfulApi\Facade\Response;
use App\Services\Admin\CategoryService;

class CategoryController extends Controller
{
    public function __construct(private CategoryService $categoryService)
    {
    }

    public function index()
    {
        $result = $this->categoryService->showCategories();
        if (!$result->success) {
            return Response::withStatus(500)->withData($result->data)->withMessage('wrong')->build()->response();
        }
        return Response::withStatus(200)->withData($result->data)->build()->response();
    }

    /**
     * BannerStoreRequest a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $result = $this->categoryService->addCategory($request->all());
        if (!$result->success) {
            return Response::withStatus(500)->withData($result->data)->withMessage('wrong')->build()->response();
        }
        return Response::withStatus(200)->withData($result->data)->withMessage('Category created successfully')->build()->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $result = $this->categoryService->showCategory($category);
        if (!$result->success) {
            return Response::withStatus(500)->withData($result->data)->withMessage('wrong')->build()->response();
        }
        return Response::withStatus(200)->withData($result->data)->build()->response();
    }

    /**
     * BannerUpdateRequest the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $result = $this->categoryService->updateCategory($request->all(), $category);
        if (!$result->success) {
            return Response::withStatus(500)->withData($result->data)->withMessage('wrong')->build()->response();
        }
        return Response::withStatus(200)->withData('Category updated successfully')->build()->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $result = $this->categoryService->deleteCategory($category);
        if (!$result->success) {
            return Response::withStatus(500)->withData($result->data)->withMessage('wrong')->build()->response();
        }
        return Response::withStatus(200)->withData('Category deleted successfully')->build()->response();
    }
}
