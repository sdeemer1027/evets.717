<!-- resources/views/user/profile.blade.php -->

@extends('layouts.app')  <!-- Assuming you have a layout file in resources/views/layouts/app.blade.php -->

@section('content')
<div class="container">
    <div>

        {{-- $user --}}
        <h2>User Profile</h2>
        @if($user->photos->count() > 0)
            @foreach($user->photos as $photo)
                @if($photo->is_profile)
                    <img src="{{ Storage::url($photo->photo_path) }}" alt="User Profile Image" style="max-height: 150px; border-radius: 25%;">
                @endif
            @endforeach
        @else
            <p>No profile image found.</p>
        @endif
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <!-- Add other user profile details as needed -->


 <h3>Pets</h3>
       @if($pets->count() > 0)
            <ul>
                @foreach($pets as $pet)
                    <li>
                        {{ $pet->name }} - {{ $pet->species }} (Age: {{ $pet->age }})
                        @if($pet->photos->count() > 0)
                            <ul>
                                @foreach($pet->photos as $photo)
                                    <li>
                                      <img src="{{ Storage::url($photo->photo_path) }}" alt="Latest Pet Photo" style="max-height: 75px; border-radius: 25%;">
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <p>No pets found.</p>
        @endif


{{-- 

        @if(auth()->check() && auth()->user()->id !== $user->id)
            <form action="{{ route('user.sendFriendRequest', ['friendId' => $user->id]) }}" method="post">
                @csrf
                <button type="submit">Send Friend Request</button>
            </form>
        @endif

--}}





    </div>
</div>

@endsection
