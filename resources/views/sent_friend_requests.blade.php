<!-- resources/views/sent_friend_requests.blade.php -->



@section('content')
    <div>
        <h2>Sent Friend Requests</h2>

        @if($sentFriendRequests->count() > 0)
            <ul>
                @foreach($sentFriendRequests as $request)
                    <li>
                        {{ $request->friend->name }} (Pending)
                    </li>
                @endforeach
            </ul>
        @else
            <p>No sent friend requests found.</p>
        @endif
    </div>
@endsection
