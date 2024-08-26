<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function home(){
        $randomPosts = Post::inRandomOrder()->take(5)->get();
        $posts = Post::all();
        return view('user.home', compact("randomPosts", "posts"));
    }

    public function postDetail($slug){
        $post = Post::where('slug', $slug)->first();
        $similarPosts = Post::where('category_id', $post->category->id)->where('id', '!=', $post->id)->take(5)->get();
        return view("posts.post-single", compact("post", 'similarPosts'));
    }

    public function postsByCategories($slug){
        $category = Category::where('slug', $slug)->first();
    if (!$category) {
        abort(404);
    }
    $posts = Post::where('category_id', $category->id)->paginate(10);
    return view('posts.posts-by-category', compact('posts', 'category'));
    }
}
