<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Mypet;
use App\Models\PetPhoto;
use App\Models\Mypet; 

class PetPhotoController extends Controller
{
    public function create($petId)
    {
        $mypet = Mypet::findOrFail($petId);
        return view('pet_photos.create', compact('mypet'));
    }

    public function store(Request $request, $petId)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the photo in the 'pet_photos' directory within 'storage/public'
        $photoPath = $request->file('photo')->store('pet_photos', 'public');


        PetPhoto::create([
            'pet_id' => $petId,
            'photo_path' => $photoPath,
        ]);

        return redirect()->route('mypets.show', $petId)->with('success', 'Photo uploaded successfully.');
    }



public function deletePhoto(Request $request, $photoId)
{
    $photo = PetPhoto::findOrFail($photoId);
dd($request);
    // Add authorization logic here if needed

    // Delete the photo file from storage
    Storage::delete('public/pet_photos/' . $photo->photo_path);

    // Delete the database entry
    $photo->delete();

    return response()->json(['message' => 'Photo deleted successfully']);
}


/*
public function deletePhoto(Request $request, $photoId)
{
    $photo = PetPhoto::findOrFail($photoId);

    // Add authorization logic here if needed

    // Delete the photo file from storage
    Storage::delete('public/pet_photos/' . $photo->photo_path);

    // Delete the database entry
    $photo->delete();

    return response()->json(['message' => 'Photo deleted successfully']);
}
*/





}