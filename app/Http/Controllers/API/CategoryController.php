<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\Admin\Categories\CategoriesListApiResource;
use App\Http\Resources\API\Admin\Categories\CategoryDetailesApiResource;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return CategoriesListApiResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
           'title'=>' required|min:3|max:50'
        ]);
        if($validation->fails()){
            return response()->json($validation->errors(),400);
        }
        Category::create($validation->validated());
        return response()->json([
            'message'=>'Category created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return new CategoryDetailesApiResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validation = Validator::make($request->all(),[
            'title'=>' required|min:3|max:50'
        ]);
        if($validation->fails()){
            return response()->json($validation->errors(),400);
        }
            $category->update($validation->validated());
        return response()->json([
            'message'=>'Category created successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'message'=>'Category deleted successfully'
        ]);
    }
}
