<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        $category= Category::get();

        return view('admin.category.index', compact('category'));
    }

    //data searching
    public function categorySearch(Request $request)
    {
        $search= $request->categorySearch;
        if (!empty($search)) {
            // Apply search logic to filter $userData
            $category = Category::where('title', 'like', '%' . $search . '%')
                               ->orWhere('description', 'like', '%' . $search . '%')
                               // Add more conditions as needed
                               ->get();
        } else {
            // Fetch all data if no search query is provided
            $category = Category::all(); 
        }
    
        return view('admin.category.index', compact('category'));
    }

    public function createCategory(Request $request){
        $request->validate([
            'categoryName'=> 'required|string|max:255',
            'description' => 'required|nullable|string',
            'updated_at'=> Carbon::now(),
        ]);

        $category = new Category;
        $category->title = $request->categoryName;
        $category->description = $request->description;
        $category->save();

        return back()->with('success', 'Category created successfully!');
    }

    public function deleteCategory($id){
        Category::where('category_id', $id)->delete();
        return back()->with(['deleteSuccess'=> 'Item Deleted successfully']);
    }
}
