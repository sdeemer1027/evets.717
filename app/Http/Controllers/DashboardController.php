<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mypet;
use App\Models\Friend;

class DashboardController extends Controller
{
    public function index()
    {

// Get the authenticated user
        $user = auth()->user();
        $profileImage = $user->profileImage;
        $galleryPhotos = $user->photos()->get();

        // You can now access the user's data using $user

//dd($user , $user->mypets);

        // Get all pets for the user
        $mypets = $user->mypets;
       // Retrieve user pets and their photos
        $userPetsWithPhotos = Mypet::with('photos')->where('userid', $user->id)->get();

  $me = auth()->id();


     $approvedFriends = Friend::where(function ($query) {
        $query->where('user_id', auth()->id())
            ->where('status', 'approved');
    })->orWhere(function ($query) {
        $query->where('friend_id', auth()->id())
            ->where('status', 'approved');
    })->with('user')->get();

    $sentFriendRequests = Friend::where('user_id', auth()->id())
        ->where('status', 'pending')
        ->with('friend')->get();

    $receivedFriendRequests = Friend::where('user_id', auth()->id())
       // ->where('friend_id', 'not', auth()->id())
        ->where('status', 'wait')
        ->with('friend')->get();



        return view('dashboard.index', compact('user', 'mypets', 'profileImage', 'galleryPhotos', 'userPetsWithPhotos',
                                               'approvedFriends','sentFriendRequests','receivedFriendRequests','me'));






    }
}
