<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ImageController extends Controller
{
    // Upload Image Controller
    public function uploadImage(Request $request){
        $request->validate([
            'file_name' => "required|image|mimes:png,jpg,jpeg,gif|max:5120",
        ]);

        $uploadPath = public_path('images/upload');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Store Image
        if ($request->file('file_name')) {
            $imageName = time() . '_' . Auth::id() . '.' . $request->file('file_name')->extension();
            $request->file('file_name')->move($uploadPath, $imageName);

            $photo = new Photo();
            $photo->user_id = Auth::id();
            $photo->file_name = $imageName;
            $photo->file_path = 'images/upload/' . $imageName;
            $photo->save();

            return response()
                ->json(['success' => true, 'message' => 'Image uploaded successfully!', 'path' => asset('images/upload' . $imageName)]);
        }
        return response()->json(['success' => false, 'message' => 'No file uploaded.']);
    }

    // Display Image
    public function displayImage(){
        $user = Auth::user();
        $photos = Photo::where('user_id', auth()->id())->get();

        return view('pages.myphotos', compact('user','photos'));
    }

    //Update Image
    public function editImage(Request $request, Photo $photo){
        try {
            $request->validate([
                "title" => "required|max:255",
                "description" => "nullable|max:255"
            ]);
    
            // Update the task with validated input
            $photo->update($request->only(['title', 'description']));
    
            return response()->json(['success' => true, 'message' => 'Image Updated successfully!']);
    
        } catch (ValidationException $error) {
            return response()->json(['success' => false, 'message' => 'Failed to update.']);

        }
    }
}
