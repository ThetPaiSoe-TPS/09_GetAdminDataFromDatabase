<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post; 
use Illuminate\Support\Facades\Storage; // Import Storage facade


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
        $post = Post::where('post_id', $id)->first();
        $categories = Category::get();
        // $categoryTitles = Category::pluck('title');
        $posts= Post::all();
        return view('admin.post.editPost', compact('post', 'categories', 'posts'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $this->validatePostRequest($request);

        $post = Post::where('post_id', $id);
        $oldImage = $post->first()->image;
        $imagePath = $request->hasFile('image') ? $request->file('image')->storeAs('postImage', now()->timestamp . '_' . $request->file('image')->getClientOriginalName(), 'public') : null;
        
        if($oldImage && $request->hasFile('image')){
            Storage::disk('public')->delete($oldImage); // Delete the old image from storage
        }
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->hasFile('image') ? $imagePath : $oldImage,
            'category_id' => $request->postCategory,
        ]);

        return redirect()->route('admin#post')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::where('post_id', $id)->first();
        if($post->image){
            Storage::disk('public')->delete($post->image); // Delete the image from storage
        }
        Post::where('post_id', $id)->delete(); // Delete the post
        
        return redirect()->route('admin#post')->with('success', 'Post deleted successfully.'); // Redirect with success message
    }
}
