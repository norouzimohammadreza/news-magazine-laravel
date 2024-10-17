<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Category\StoreRequest;
use App\Http\Requests\Api\Admin\Category\UpdateRequest;
use App\Models\Category;
use App\Services\Admin\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct(private CategoryService $categoryService)
    {
    }

    public function index()
    {

        $result = $this->categoryService->showCategries();
        $result = $result->data->all();
        return view('admin.category.index', [
            'categories' => $result
        ]);
    }

    public function show(Request $request)
    {
        dd('hi1');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $store)
    {
        $this->categoryService->addCategory($store->all());
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
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $update, Category $category)
    {
        $this->categoryService->updateCategory($update->all(), $category);
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
