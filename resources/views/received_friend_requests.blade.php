<!-- resources/views/received_friend_requests.blade.php -->

@extends('layouts.app')

@section('content')
    <div>
        <h2>Received Friend Requests</h2>

        @if($receivedFriendRequests->count() > 0)
            <ul>
                @foreach($receivedFriendRequests as $request)
                    <li>
                        {{ $request->user->name }} sent you a friend request. 
                        <form action="{{ route('user.acceptFriendRequest', ['friendId' => $request->user->id]) }}" method="post">
                            @csrf
                            <button type="submit">Accept</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No received friend requests found.</p>
        @endif
    </div>
@endsection
