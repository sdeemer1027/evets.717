<?php
// app/Http/Controllers/UserPhotoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPhoto;

use Illuminate\Support\Facades\Storage;

class UserPhotoController extends Controller
{
    public function uploadProfileImage(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photoPath = $request->file('photo')->store('user_photos', 'public');

        $myupdate = UserPhoto::where('user_id',auth()->user()->id)->where('is_profile',1)->get();
        if($myupdate->isEmpty()){
    // dd('nothinghere');
        }else{
    // dd($myupdate);
        $myupdate[0]->update(['is_profile' => 0]); 
        }
        
        auth()->user()->profileImage()->create([
            'photo_path' => $photoPath,
            'is_profile' => true,
        ]);

        return redirect()->back()->with('success', 'Profile image uploaded successfully.');
    }
public function makeProfile(Request $request)
{

$newoldid=UserPhoto::where('user_id',$request->uid)->update(['is_profile' => 0]);

$newpid = UserPhoto::where('id' ,$request->id)->update(['is_profile' => 1]);

//dd($request->uid,$request->id,$request);
return redirect()->back()->with('success', 'Profile image uploaded successfully.');
}




    public function uploadGalleryPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photoPath = $request->file('photo')->store('user_photos', 'public');

        auth()->user()->photos()->create([
            'photo_path' => $photoPath,
            'is_profile' => false,
        ]);

        return redirect()->back()->with('success', 'Gallery photo uploaded successfully.');
    }


public function deletePhoto($id)
    {
      

  

        // Find the photo by ID
        $photo = UserPhoto::find($id);

 
Storage::delete('public/' .$photo->photo_path);
//dd($id,$photo);
        // Perform deletion logic
        if ($photo) {
            // Delete the photo from storage
            // ...

            // Delete the photo from the database
            $photo->delete();

            // Redirect or respond as needed
            return redirect()->back()->with('success', 'Photo deleted successfully.');
        } else {
            // Photo not found, handle accordingly
            return redirect()->back()->with('error', 'Photo not found.');
        }
    }









}
