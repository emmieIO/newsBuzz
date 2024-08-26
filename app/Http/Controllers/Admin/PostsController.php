<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.posts.add_post", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            "slug" => "required|string",
            'content' => 'required|string',
            'category' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:avif,jpg,jpeg,png|max:2048',
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category');
        $post->user_id = auth()->user()->id;
        $post->published_at = now();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/posts'), $imageName);
            $post->image = $imageName;
        }

        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return;
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $post = Post::findOrFail($id);
        $categories= Category::all();
        return view('admin.posts.edit_post', compact("post", "categories"));
    }
   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            "slug" => "required|string",
            'content' => 'required|string',
            'category' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:avif,jpg,jpeg,png|max:2048',
        ]);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image) {
                unlink(public_path('images/posts/' . $post->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/posts'), $imageName);
            $post->image = $imageName;
        }

        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        // check if post image exists
        if($post->image){
            unlink(public_path('images/posts/' . $post->image));
        }
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully!');
    }
}
