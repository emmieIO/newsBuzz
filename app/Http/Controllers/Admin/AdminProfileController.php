<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    function getProfile(){
        return view("admin.profile.profile");
    }

    public function editPersonalInfo(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
        ]);

        $user->name = $request->input('name');
        $user->bio = $request->input('bio');

        $user->save();

        return redirect()->back()->with('success', 'Personal info updated successfully!');
    }

     /**
     * Handle password reset request
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
            'new_password_confirmation' => 'required',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully');
    }

    public function updateProfilePicture(Request $request)
    {
        // Validate the request
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Get the authenticated user
        $user = auth()->user();

        if($request->hasFile('profile_picture')){
            // Delete the existing image
            if(!empty($user->img)){
                $filePath = public_path("images/profile_pictures/".$user->img);
                if(file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $file = $request->file("profile_picture");
            $filename = time()."_".$file->getClientOriginalName();
            $file->move(public_path("images/profile_pictures"), $filename);
            $user->img = $filename;
        }
        // Update the user's profile picture
        $user->save();

        // Return a success message
        return redirect()->back()->with('success', 'Profile picture updated successfully!');
    }

}
