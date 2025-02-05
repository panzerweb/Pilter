<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    //Update User
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        // Validate the request
        $request->validate([
            "name" => 'required|max:255|string',
            "bio" => 'nullable|max:255',
            "profilepic" => 'nullable|sometimes|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);
    
        // Handle profile picture upload
        if ($request->hasFile('profilepic')) {
            $imageName = time() . '.' . $request->profilepic->extension();
            $request->profilepic->move(public_path('images/users'), $imageName);
    
            // Update the image path in the database
            $user->profilepic = 'images/users/' . $imageName;
        }
    
        // Update other fields
        $user->name = $request->name;
        $user->bio = $request->bio;
    
        // Save the updated user
        $user->save();
    
        return redirect()->route('pages.myphotos')->with('success', 'User Updated Successfully.'); 

    }

    public function updatePassword(Request $request, User $user){
        // Validate the request
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->password = $request->password;
        $user->save();

        return redirect()->route('pages.myphotos')->with('success', 'User Updated Successfully.'); 

    }

    //Visit Profile
    public function visitProfile($id){
        $user = User::findOrFail($id);
        $photos = Photo::where('user_id', $id)->get();

        return view('user.profile', compact('user', 'photos'));
    }

    public function showProfile($id){
        $user = User::findOrFail($id);
        $user->where('user_id', $id);

        return view('user.view-profile', compact('user'));
    }
}