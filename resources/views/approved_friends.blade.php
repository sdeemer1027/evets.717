<!-- resources/views/approved_friends.blade.php -->



@section('content')
    <div>
        <h2>Approved Friends</h2>
{{$me}}
        @if($approvedFriends->count() > 0)
            <ul>
                @foreach($approvedFriends as $friend)
                @if($friend->user->id == $me)
             {{--    <li><a href="{{ route('user.profile', ['id' => $friend->user->id]) }}">{{ $friend->user->name }}</a> Your Profile</li> --}}
                @else

                    <li>
                        <a href="{{ route('user.profile', ['id' => $friend->user->id]) }}">{{ $friend->user->name }}</a>
                    </li>
                    @endif
                @endforeach
            </ul>
        @else
            <p>No approved friends found.</p>
        @endif
    </div>
@endsection
