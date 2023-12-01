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
}
