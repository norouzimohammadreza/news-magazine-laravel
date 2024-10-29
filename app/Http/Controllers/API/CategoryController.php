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
        return Response::withStatus(200)->withData($result->data)->build()->response();
    }

    public function store(CategoryStoreRequest $categoryStoreRequest)
    {
        $this->categoryService->addCategory($categoryStoreRequest->validated());
        return Response::withStatus(200)->withMessage('Category created successfully')->build()->response();
    }

    public function show(Category $category)
    {
        $result = $this->categoryService->showCategory($category);
        return Response::withStatus(200)->withData($result->data)->build()->response();
    }

    public function update(CategoryUpdateRequest $categoryUpdateRequest, Category $category)
    {
        $this->categoryService->updateCategory($categoryUpdateRequest->validated(), $category);
        return Response::withStatus(200)->withMessage('Category updated successfully')->build()->response();
    }

    public function destroy(Category $category)
    {
        $this->categoryService->deleteCategory($category);
        return Response::withStatus(200)->withMessage('Category deleted successfully')->build()->response();
    }

}
