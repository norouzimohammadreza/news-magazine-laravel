<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('app.index',[
            'categories' => $categories
        ]);
    }
    public function category($category)
    {
        return $category;
    }
}
