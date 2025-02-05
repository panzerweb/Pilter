<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Throwable;

class ImageController extends Controller
{
    // Upload Image Controller
    public function uploadImage(Request $request){
        $request->validate([
            "title" => "nullable|max:255",
            "description" => "nullable|max:255",
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
            $photo->title = $request->title;
            $photo->description = $request->description;
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
    public function displayTrashed(){
        $user = Auth::user();
        $photos = Photo::where('user_id', auth()->id())->withTrashed()->get();
        
        return view('pages.trash', compact('user','photos'));
    }
    // Display posted images in news feed
    public function displayPost(){
        $user = Auth::user();
        $photos = Photo::with('user')
                    ->inRandomOrder()
                    ->get();

        return view('pages.newsfeed', compact('user','photos'));
    }

    //Update Image
    public function editImage(Request $request, Photo $photo)
    {
        try {
            $request->validate([
                "title" => "nullable|max:255",
                "description" => "nullable|max:255",
            ]);


            // Update the photo record in the database
            $photo->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            return response()->json(['success' => true, 'message' => 'Image updated successfully!']);
            
        } catch (ValidationException $error) {
            return response()->json(['success' => false, 'message' => 'Validation failed.'], 422);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while updating the image.'], 500);
        }
    }

    //Download Image
    public function downloadImage($id){
        try {
            $photo = Photo::findOrFail($id);

            $filePath = public_path($photo->file_path);

            return response()->download($filePath);
        } catch (Throwable $error) {
            return $error;
        }
        
    }

    // Delete Image and Restore Image
    public function deleteImage($id){
        Photo::findOrFail($id)->delete();

        return response()->json(['success' => true, 'message' => 'Image deleted successfully!',]);
    }
    
    public function forceDelete($id){
        Photo::withTrashed()->findOrFail($id)->forceDelete();

        return response()->json(['success' => true, 'message' => 'Image deleted permanently!',]);

    }
    public function restoreImage($id){
        $photo = Photo::withTrashed()->findOrFail($id);
        $photo->restore();

        return response()->json(['success' => true, 'message' => 'Image restored successfully!',]);
    }
    public function deleteAll(){
        $photo = Photo::whereNotNull('deleted_at');

        $photo->forceDelete();



        return response()->json(['success' => true, 'message' => 'All Image deleted permanently!',]);

    }
}
