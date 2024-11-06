<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Category\CategoryStoreRequest;
use App\Http\Requests\Api\Admin\Category\CategoryUpdateRequest;
use App\Models\Category;
use App\Services\Admin\CategoryService;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function store(CategoryStoreRequest $request)
    {
        Alert::success(__('alert.alerts.create',['name'=>'Category'])
            ,__('alert.alerts.create_msg',['name'=>'Category']));
        $this->categoryService->addCategory($request);
        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        Alert::success(__('alert.alerts.update',['name'=>'Category'])
            ,__('alert.alerts.update_msg',['name'=>'Category']));
        $this->categoryService->updateCategory($request, $category);
        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        Alert::success(__('alert.alerts.delete',['name'=>'Category'])
            ,__('alert.alerts.delete_msg',['name'=>'Category']));
        $this->categoryService->deleteCategory($category);
        return redirect()->route('category.index');
    }
}
