<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Http\Resources\API\Admin\Categories\CategoriesListApiResource;
use App\Models\Category;

class CategoryService
{

    public function showCategories(): ServiceResult
    {

        $categories = Category::paginate(2);
        return new ServiceResult(true, CategoriesListApiResource::collection($categories));

    }

    public function addCategory(array $request): ServiceResult
    {

        Category::create($request);
        return new ServiceResult(true);

    }

    public function showCategory(Category $category): ServiceResult
    {

        return new ServiceResult(true, new CategoriesListApiResource($category));

    }

    public function updateCategory(array $request, Category $category): ServiceResult
    {

        $category->update($request);
        return new ServiceResult(true, $category);

    }

    public function deleteCategory(Category $category): ServiceResult
    {

        $category->delete($category);
        return new ServiceResult(true);

    }

}
