<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Category\StoreRequest;
use App\Http\Resources\API\Admin\Categories\CategoriesListApiResource;
use App\Http\Resources\API\Admin\Categories\CategoryDetailesApiResource;
use App\Models\Category;
use App\RestfulApi\Facade\Response;
use App\Services\Admin\CategoryService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(private CategoryService $categoryService)
    {
    }

    public function index()
    {
        $result = $this->categoryService->showCategries();
        if (!$result->success){
            return Response::withStatus(500)->withData($result->data)->withMessage('wrong')->build()->response();
        }
        return Response::withStatus(200)->withData($result->data)->build()->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $result = $this->categoryService->addCategory($request->all());
        if (!$result->success){
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
        if (!$result->success){
            return Response::withStatus(500)->withData($result->data)->withMessage('wrong')->build()->response();
        }
        return Response::withStatus(200)->withData($result->data)->build()->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
       $result = $this->categoryService->updateCategory($request->all(),$category);
        if (!$result->success){
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
        if (!$result->success){
            return Response::withStatus(500)->withData($result->data)->withMessage('wrong')->build()->response();
        }
        return Response::withStatus(200)->withData('Category deleted successfully')->build()->response();
    }
}
