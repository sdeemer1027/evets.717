<?php
// app/Http/Controllers/MypetController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mypet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\PetPhoto; // Make sure to import the PetPhoto class


class MypetController extends Controller
{
    public function index()
    {
 //       $mypets = Mypet::all();

// Get the ID of the currently authenticated user
$userId = Auth::id();

// Retrieve pets for the current user
//$mypets = Mypet::where('userid', $userId)->get();
  // Retrieve pets for the current user with their latest photo
    $mypets = Mypet::with('latestPhoto')->where('userid', $userId)->get();


        return view('mypets.index', compact('mypets'));
    }

    public function show($id)
    {
        $mypet = Mypet::findOrFail($id);

  // Retrieve photos only if the pet has any
        $photos = $mypet->photos ?? collect();

        return view('mypets.show', compact('mypet', 'photos'));

 //       return view('mypets.show', compact('mypet'));
    }

    // Add other CRUD methods as needed




    // Existing methods...

    public function create()
    {
        return view('mypets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'age' => 'required|integer',
        ]);

        Mypet::create([
            'name' => $request->input('name'),
            'species' => $request->input('species'),
            'age' => $request->input('age'),
            'userid' => auth()->id(), // Assuming 'userid' is the user ID field
        ]);

        return redirect()->route('mypets.index')->with('success', 'Pet added successfully.');
    }




public function deletePhoto(Request $request, $photoId)
{




    $photo = PetPhoto::findOrFail($photoId);

    // Add authorization logic here if needed

    // Delete the photo file from storage   'public/pet_photos/' .
    // Delete the photo file from storage   
    Storage::delete('public/' .$photo->photo_path);

 // {{ Storage::url($photo->photo_path) }}
    // Delete the database entry
    $photo->delete();

    return response()->json(['message' => 'Photo deleted successfully']);
}





}
