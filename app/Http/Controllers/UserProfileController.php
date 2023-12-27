<?php

namespace App\Http\Controllers;
use App\Models\Mypet;

use App\Models\User;
use App\Models\Friend;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserProfileController extends Controller
{
    public function show($id)
    {
    // Check if the user is on the friend's approved list
    $isFriend = Friend::where('user_id', auth()->id())
                      ->where('friend_id', $id)
                      ->where('status', 'approved')
                      ->exists();

    // If not a friend, abort or redirect as needed
    if (!$isFriend) {
        abort(403, 'Unauthorized'); // You can customize this as needed
    }

        $user = User::with('photos')->findOrFail($id);


// $user = User::with(['profilePhotos' => function ($query) {
//        $query->where('is_profile', 1);
//    }])->where('id', $id)->where('is_profile', 1)->first();


//dd($user);


    $pets = Mypet::with('photos')->where('userid', $id)->get();

    return view('user.profile', ['user' => $user, 'pets' => $pets]);

  
    }
public function editProfile()
    {
        return view('edit_profile');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
      //      'address2' => 'string|max:255',
            'phone' => 'required|string|max:255',
            'zip' => 'required|string|max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            // Add more validation rules for other fields
        ]);

        $user->update([
            'name' => $request->input('name'),
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'address2' => $request->input('address2'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'zip' => $request->input('zip'),
            'email' => $request->input('email'),
            // Update other fields as needed
        ]);

        return redirect()->route('editProfile')->with('success', 'Profile updated successfully.');
    }




public function sendFriendRequest($friendId)
{
    $user = auth()->user();

    // Check if a friend request already exists
    $existingRequest = Friend::where('user_id', $user->id)
        ->where('friend_id', $friendId)
        ->where('status', 'pending')
        ->first();

    if ($existingRequest) {
        return redirect()->back()->with('error', 'Friend request already sent.');
    }

    // Create a new friend request
    Friend::create([
        'user_id' => $user->id,
        'friend_id' => $friendId,
        'status' => 'pending',
    ]);
    Friend::create([
        'user_id' => $friendId,
        'friend_id' => $user->id,
        'status' => 'wait',
    ]);

    return redirect()->back()->with('success', 'Friend request sent successfully.');
}


public function showAllUsers()
{
  //  $users = User::where('id', '!=', auth()->id())->get();


//$uss = User::where('id', '!=', auth()->id())->with('profileImage')->paginate(10);


$users = User::where('id', '!=', auth()->id())->with(['friends' => function ($query) {
    // You can customize this query based on your friends table structure
    $query->select('friend_id', 'status');
}])->with('profileImage')
->paginate(10);  //
//->limit('10')
//->get();
//dd($users); ->limit('10'), 'uss' =>$uss

    return view('all_users', ['users' => $users]);
}



public function showFriendRequests()
{
    $friendRequests = Friend::where('friend_id', auth()->id())
        ->where('status', 'pending')
        ->with('user') // Eager load user details for efficiency
        ->get();

    return view('friend_requests', ['friendRequests' => $friendRequests]);
}


public function acceptFriendRequest($friendId)
{
  


    $friendRequest = Friend::where('user_id', $friendId)
        ->where('friend_id', auth()->id())
        ->where('status', 'pending')
        ->first();

    if ($friendRequest) {

        $friendRequest->update(['status' => 'approved']);
    }


        $friendRequest2 = Friend::where('user_id', auth()->id())
        ->where('friend_id', $friendId )
        ->where('status', 'wait')
        ->first();
       $friendRequest2->update(['status' => 'approved']);


//friendRequests

    return redirect()->route('dashboard')->with('success', 'Friend request accepted.');

}

public function showApprovedFriends()
{
    $me = auth()->id();
    $approvedFriends = Friend::where(function ($query) {
        $query->where('user_id', auth()->id())
            ->where('status', 'approved');
    })->orWhere(function ($query) {
        $query->where('friend_id', auth()->id())
            ->where('status', 'approved');
    })->with('user')->get();

    return view('approved_friends', ['approvedFriends' => $approvedFriends, 'me'=>$me]);
}

public function showSentFriendRequests()
{
    $sentFriendRequests = Friend::where('user_id', auth()->id())
        ->where('status', 'wait')
        ->with('friend')->get();
//dd($sentFriendRequests);
    return view('sent_friend_requests', ['sentFriendRequests' => $sentFriendRequests]);
}

public function showReceivedFriendRequests()
{
    $receivedFriendRequests = Friend::where('friend_id', auth()->id())
        ->where('status', 'pending')
        ->with('user')->get();

    return view('received_friend_requests', ['receivedFriendRequests' => $receivedFriendRequests]);
}

public function showDashboard()
{
    $approvedFriends = Friend::where(function ($query) {
        $query->where('user_id', auth()->id())
            ->where('status', 'approved');
    })->orWhere(function ($query) {
        $query->where('friend_id', auth()->id())
            ->where('status', 'approved');
    })->with('user')->get();

    $sentFriendRequests = Friend::where('user_id', auth()->id())
        ->where('status', 'wait')
        ->orWhere(function ($query) {
        $query->where('friend_id', auth()->id())
            ->where('status', 'pending');
    })->with('friend')->get();

    $receivedFriendRequests = Friend::where('friend_id', auth()->id())
        ->where('status', 'pending')
        ->orWhere(function ($query) {
        $query->where('user_id', auth()->id())
            ->where('status', 'wait');
     })->with('user')->get();

    return view('dashboard', [
        'approvedFriends' => $approvedFriends,
        'sentFriendRequests' => $sentFriendRequests,
        'receivedFriendRequests' => $receivedFriendRequests,
    ]);
}
}
