<!-- resources/views/friend_requests.blade.php -->


@section('content')
    <div>
        <h2>Friend Requests</h2>

        @if($friendRequests->count() > 0)
            <ul>
                @foreach($friendRequests as $request)
                    <li>
                        {{ $request->user->name }} sent you a friend request.
                        @if($request->status === 'pending')
                            <form action="{{ route('user.acceptFriendRequest', ['friendId' => $request->user->id]) }}" method="post">
                                @csrf
                                <button type="submit">Accept</button>
                            </form>
                        @else
                            <a href="{{ route('user.profile', ['id' => $request->user->id]) }}">View Profile</a>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <p>No friend requests found.</p>
        @endif
    </div>
@endsection
