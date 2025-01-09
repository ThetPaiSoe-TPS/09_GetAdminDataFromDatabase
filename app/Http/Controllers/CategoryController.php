<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category= Category::get();
        return view('admin.category.index', compact('category'));
    }

    public function createCategory(Request $request){
        $request->validate([
            'categoryName'=> 'required|string|max:255',
            'description' => 'nullable|string',
            'updated_at'=> Carbon::now(),
        ]);

        $category = new Category;
        $category->title = $request->categoryName;
        $category->description = $request->description;
        $category->save();

        return back()->with('success', 'Category created successfully!');
    }
}
