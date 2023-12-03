<?php
// app/Http/Controllers/MypetController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mypet;
use App\Models\User;
use App\Models\OwnerDetail;

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
$allOwnerDetails = '';
        $allOwnerDetails = Ownerdetail::where('user_id',$mypet->userid)->first();
        $ownerinfo = User::findOrFail($mypet->userid);



//dd($mypet,$allOwnerDetails,$ownerinfo);



//dd($mypet,$mergedOwnerDetails,$ownerinfo,$ownerDetailsToShow);
        return view('mypets.show', compact('mypet', 'photos','ownerinfo','allOwnerDetails'));

 //       return view('mypets.show', compact('mypet'));
    }

    // Add other CRUD methods as needed


public function edit($petId)
    {
        $pet = Mypet::findOrFail($petId);

//dd($pet);


        // Check if the authenticated user is the owner of the pet
        if ($pet->user->id !== auth()->user()->id) {
            return redirect()->route('dashboard.index')->with('error', 'You are not authorized to edit this pet.');
        }

        // Add logic to handle the edit view and form
        return view('mypets.edit', compact('pet'));
    }


 public function update(Request $request, $petId)
    {
        $pet = Mypet::findOrFail($petId);

        // Check if the authenticated user is the owner of the pet
        if ($pet->user->id !== auth()->user()->id) {
            return redirect()->route('dashboard.index')->with('error', 'You are not authorized to edit this pet.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
        ]);

        // Update the name and age of the pet
        $pet->update([
            'name' => $request->input('name'),
            'age' => $request->input('age'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Pet updated successfully.');
    }



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
