<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\User\PostController as BlogController;


Route::get('/admin/login', function () {
    return view('admin.auth.login');
})->middleware(["guest"]);


Route::post('/admin/login', [AdminUserController::class, 'authenticate'])
->name('login');


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get("/admin/dashboard",[AdminUserController::class, 'index'])->name('admin.dashboard');
    Route::get("/admin/users",[AdminUserController::class, 'users'])->name('admin.users');
    Route::get("/admin/users/register",[AdminUserController::class, 'addUser'])->name('admin.users.add');
    Route::post("/admin/users/register",[AdminUserController::class, 'store'])->name('admin.users.store');
    Route::put("/admin/users/{user}",[AdminUserController::class, 'updateRole'])->name('admin.users.update-role');
    Route::delete("/admin/users/destroy/{user}",[AdminUserController::class, 'DeleteUser'])->name('admin.users.destroy');
    Route::post("/admin/users/deactivate/{user}",[AdminUserController::class, 'updateStatus'])->name('admin.users.block');
    Route::post("/admin/users/activate/{user}",[AdminUserController::class, 'updateStatus'])->name('admin.users.activate');

    Route::get("/admin/users/profile",[AdminProfileController::class, 'getProfile'])->name('admin.users.profile');
    Route::post("/admin/users/profile",[AdminProfileController::class, 'editPersonalInfo'])->name('admin.profile.editPersonalInfo');
    Route::post("/admin/users/reset-password",[AdminProfileController::class, 'updatePassword'])->name('admin.profile.reset-password');
    Route::post("/admin/users/update-dp",[AdminProfileController::class, 'updateProfilePicture'])->name('admin.update-profile-picture');

    // Category Management
    Route::get("/admin/categories", [CategoriesController::class, "index"])->name("admin.categories.index");
    Route::get("/admin/categories/create", [CategoriesController::class, "create"])->name("admin.categories.create");
    Route::post("/admin/categories/create", [CategoriesController::class, "store"])->name("admin.categories.store");
    Route::get("/admin/categories/edit/{id}", [CategoriesController::class, "edit"])->name("admin.categories.edit");
    Route::put("/admin/categories/edit/{category}", [CategoriesController::class, "update"])->name("admin.categories.update");
    Route::delete('/admin/categories/{category}', [CategoriesController::class, 'destroy'])->name('admin.categories.destroy');

    // Post Management
    Route::get("/admin/posts", [PostsController::class, "index"])->name("admin.posts.index");
    Route::get("/admin/posts/add", [PostsController::class, "create"])->name("admin.posts.create");
    Route::post("/admin/posts", [PostsController::class, "store"])->name("admin.posts.store");
    Route::get("/admin/posts/{id}", [PostsController::class, "edit"])->name("admin.posts.edit");
    Route::put("/admin/posts/edit/{id}", [PostsController::class, "update"])->name("admin.posts.update");
    Route::delete("/admin/posts/destroy/{id}", [PostsController::class, "destroy"])->name("admin.posts.destroy");
});


Route::middleware(['auth'])->group(function(){
    
    
});

Route::get("/posts/{slug}", [BlogController::class, "postDetail"])->name('post-detail');
Route::get("/posts/categories/{slug}", [BlogController::class, "postsByCategories"])->name('post-by-category');
Route::get("/", [BlogController::class, "home"])->name('home');