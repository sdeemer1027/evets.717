<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mypet;

class DashboardController extends Controller
{
    public function index()
    {

// Get the authenticated user
        $user = auth()->user();
        $profileImage = $user->profileImage;
        $galleryPhotos = $user->photos()->where('is_profile', false)->get();

        // You can now access the user's data using $user

//        return view('dashboard.index', compact('user'));

//dd($user , $user->mypets);

        // Get all pets for the user
        $mypets = $user->mypets;
       // Retrieve user pets and their photos
        $userPetsWithPhotos = Mypet::with('photos')->where('userid', $user->id)->get();

        return view('dashboard.index', compact('user', 'mypets', 'profileImage', 'galleryPhotos', 'userPetsWithPhotos'));






    }
}
