<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AdminUserController extends Controller
{
    function authenticate(Request $request) : RedirectResponse {
        $request->validate([
            "email" => "required|email",
            "password" => "required|string",
        ]);

        $credentials = $request->only("email", "password");
        if (Auth::attempt($credentials)) {
            if(Auth::user()->isAdmin && Auth::user()->role == "admin"){
                $request->session()->regenerate();
                return redirect()->intended("admin/dashboard");
            }else{
                return back()->withErrors([
                    "email" => "The provided credentials do not match our records.",
                ]);
            }
        } else {
            return back()->withErrors([
                "email" => "The provided credentials do not match our records.",
            ]);
        }
    }

    function index() {
        $usersCount = User::where('status', 'active')->count();
        $blockedusersCount = User::where('status', 'blocked')->count();
        $postCount = Post::count();
        $categoryCount =  Category::count();
        return view("admin.dashboard", compact('usersCount',  'blockedusersCount',"postCount", "categoryCount"));
    }

    function users(){
        $users = \App\Models\User::where("isAdmin", false)->paginate(10);
        return view("admin.users", compact("users"));
    }

    function addUser() {
        return view("admin.auth.add-user");
    }

    function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'role' => 'required|string|in:admin,author,user',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
        ]);

        if($request->file('img')){
            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/profile_pictures'), $imageName);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'img' => $imageName,
        ]);
        if($user->role == "admin"){
            $user->isAdmin = true;
            $user->save();
        }
        return redirect()->back()->with('success', 'User created successfully');
    }

    function updateRole(Request $request, User $user){
                // Validate the request data
                $request->validate([
                    'role' => 'required|string|in:user,editor,author,admin',
                ]);

                // Update the user's role and isAdmin status
                $isAdmin = ($request->input('role') == 'admin') ? true : false;

                // Update the user's role and isAdmin status
                $user->update([
                    'role' => $request->input('role'),
                    'isAdmin' => $isAdmin,
                ]);

                // Return a success response
                return redirect()->back()->with('success', 'User role updated successfully!');

    }

    function deleteUser(User $user){
        if (!empty($user->img)) {
            $filePath = public_path("images/profile_pictures/".$user->img);
            if(file_exists($filePath)){
                unlink($filePath);
            }
        }

        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully!');

    }

    function updateStatus(User $user){
        if($user->status == 'blocked'){
            $user->update(['status' => 'active']);
            return redirect()->back()->with('success', 'User activated successfully!');
        }
        if($user->status == 'active'){
            $user->update(['status' => 'blocked']);
            return redirect()->back()->with('success', 'User blocked successfully!');
        }
    }
}
