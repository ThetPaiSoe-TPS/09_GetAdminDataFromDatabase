<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post; 

class PostController extends Controller
{
    public function index(){
        $category= Category::get();
        return view('admin.post.index', [
            'category' => $category,
            'posts' => Post::all() 
        ]);
    }

    public function createPost(Request $request)
    {
        $validatedData = $this->validatePostRequest($request);

        $imagePath = $request->hasFile('image') ? $request->file('image')->storeAs('postImage', now()->timestamp . '_' . $request->file('image')->getClientOriginalName(), 'public') : null;
        
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->hasFile('image') ? $imagePath : null,
            'category_id' => $request->postCategory,
        ]);

        return redirect()->route('admin#post')->with('success', 'Post created successfully.');
    }
    
    //post validation check
    private function validatePostRequest(Request $request)
        {
            return $request->validate([
                'title' => 'required|string|max:50',
                'description' => 'required|string',
                // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'postCategory' => 'required|integer|exists:categories,category_id',
            ]);
        }

    public function edit($id)
    {
        $post = Post::findOrFail($id); // Fetch the post by ID
        return view('admin#editPost', compact('post')); // Return the edit view with the post data
    }

    public function destroy($id)
    {
        $post = Post::where('post_id', $id)->firstOrFail(); 
        $post->delete(); // Delete the post

        return redirect()->route('admin.post.index')->with('success', 'Post deleted successfully.'); // Redirect with success message
    }
}
