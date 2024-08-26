<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    function index() {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }
    function create() {
        return view('admin.categories.addCategory');
    }

    function store(CategoryRequest $request){
        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->description = $request->input('description');
        $category->parent_id = $request->input('parent_id');

        if($request->hasFile("image")){
            $file = $request->file("image");
            $filename = time()."_".$file->getClientOriginalName();
            $file->move(public_path("images/categories"), $filename);
            $category->image = $filename;
        }
        $category->save();
        return redirect()->back()->with('success', 'Category added successfully');
    }

    function edit($id){
        $category = Category::findOrFail($id);
        return view("admin.categories.editCategory", compact('category'));
    }

    function update(CategoryUpdateRequest $request, Category $category) {
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->description = $request->input('description');
        $category->parent_id = $request->input('parent_id');

        if($request->hasFile("image")){
            // Delete the existing image
            if($category->image){
                $filePath = public_path("images/categories/".$category->image);
                if(file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $file = $request->file("image");
            $filename = time()."_".$file->getClientOriginalName();
            $file->move(public_path("images/categories"), $filename);
            $category->image = $filename;
        }
        $category->save();
        return redirect()->back()->with('success', 'Category updated successfully');
    }

    function destroy(Category $category) {
        // Delete the category image
        if($category->image){
            $filePath = public_path("images/categories/".$category->image);
            if(file_exists($filePath)) {
                unlink($filePath);
            }
        }
        // Delete the category
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
