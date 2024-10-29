<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Http\Requests\Api\Admin\Category\CategoryStoreRequest;
use App\Http\Requests\Api\Admin\Category\CategoryUpdateRequest;
use App\Http\Resources\API\Admin\Categories\CategoriesListApiResource;
use App\Models\Category;

class CategoryService
{

    public function showCategories(): ServiceResult
    {

        $categories = Category::paginate(2);
        return new ServiceResult(true, CategoriesListApiResource::collection($categories));

    }

    public function addCategory(CategoryStoreRequest $request): ServiceResult
    {
        $validatedRequest = $request->validated();
        Category::create($validatedRequest);
        return new ServiceResult(true);

    }

    public function showCategory(Category $category): ServiceResult
    {

        return new ServiceResult(true, new CategoriesListApiResource($category));

    }

    public function updateCategory(CategoryUpdateRequest $request, Category $category): ServiceResult
    {
        $validatedRequest = $request->validated();
        $category->update($validatedRequest);
        return new ServiceResult(true, $category);

    }

    public function deleteCategory(Category $category): ServiceResult
    {

        $category->delete($category);
        return new ServiceResult(true);

    }

}
