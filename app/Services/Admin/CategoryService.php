<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Http\Resources\API\Admin\Categories\CategoriesListApiResource;
use App\Models\Category;
use Illuminate\Contracts\Debug\ExceptionHandler;

class CategoryService
{
    public function showCategries() : ServiceResult
    {
        try {
            $categories = Category::all();
        }catch (\Throwable $th){
            app()[ExceptionHandler::class]->report($th);
            return new ServiceResult(false,$th->getMessage());
        }
        return new ServiceResult(true,CategoriesListApiResource::collection($categories));
    }
    public function addCategory(array $request) : ServiceResult
    {
        try {
            $category = Category::create($request);

        } catch (\Throwable $th) {
            app()[ExceptionHandler::class]->report($th);
            return new ServiceResult(false, $th->getMessage());
        }
        return new ServiceResult(true, $category);


    }
    public function showCategory(Category $category) : ServiceResult
    {
        try{
            return new ServiceResult(true, new CategoriesListApiResource($category));

    } catch (\Throwable $th) {
    app()[ExceptionHandler::class]->report($th);
    return new ServiceResult(false, $th->getMessage());
}
    }
    public function updateCategory(array $request, Category $category) : ServiceResult{
        try{
            $category->update($request);
        } catch (\Throwable $th) {
            app()[ExceptionHandler::class]->report($th);
            return new ServiceResult(false, $th->getMessage());
    }
    return new ServiceResult(true, $category);
}
    public function deleteCategory(Category $category) : ServiceResult{
        try{
            $category->delete($category);
        } catch (\Throwable $th) {
            app()[ExceptionHandler::class]->report($th);
            return new ServiceResult(false, $th->getMessage());
        }
        return new ServiceResult(true);
    }
}
