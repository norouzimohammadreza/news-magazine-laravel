<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Category\CategoryStoreRequest;
use App\Http\Requests\Api\Admin\Category\CategoryUpdateRequest;
use App\Models\Category;
use App\Services\Admin\CategoryService;

class CategoryController extends Controller
{

    public function __construct(private CategoryService $categoryService)
    {
    }

    public function index()
    {

        $result = $this->categoryService->showCategories();
        $categories = $result->data;
        return view('admin.category.index', [
            'categories' => $categories
        ]);

    }

    public function create()
    {

        return view('admin.category.create');

    }

    /**
     * BannerStoreRequest a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $categoryStoreRequest)
    {

        $this->categoryService->addCategory($categoryStoreRequest);
        return redirect('admin/category');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        return view('admin.category.edit', [
            'category' => $category
        ]);

    }

    /**
     * BannerUpdateRequest the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $categoryUpdateRequest, Category $category)
    {

        $this->categoryService->updateCategory($categoryUpdateRequest, $category);
        return redirect('admin/category');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        $this->categoryService->deleteCategory($category);
        return redirect('admin/category');

    }
}
