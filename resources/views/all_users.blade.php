<!-- resources/views/all_users.blade.php -->

@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <div class="row">
   
<div  class="col-md-8">
 <h2>All Users</h2>

     @if($users->count() > 0)
        <ul>
            @foreach($users as $otherUser)
                @if(auth()->user()->id !== $otherUser->id)
                        <li>  
                   @if(isset($otherUser['friends']))   
otherUser[friends] IS Set for this user<BR><BR>
                    
                      @foreach($otherUser['friends'] as $friend)
                          @if($friend['friend_id'] == auth()->user()->id)
                            @if($friend['status'] === 'pending')
                              <form action="{{ route('user.acceptFriendRequest', ['friendId' => $otherUser->id]) }}" method="post">
                                  @csrf
                                  <button type="submit" class="btn btn-primary">Accept  {{$otherUser->name}} {{--$request->friend->id--}}{{$otherUser->id}}</button>
                              </form>
                            @elseif($friend['status'] === 'wait')
                              <span>Friend Request Sent (Pending {{$otherUser->name}} Approval)</span>       
                            @elseif($friend['status'] === 'approved')
                              <a href="{{ route('user.profile', ['id' => $otherUser->id]) }}">View Profile {{$otherUser->name}}</a>
                            @else
                            {{--         <form action="{{ route('user.sendFriendRequest', ['friendId' => $otherUser->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">Send {{ $otherUser->name }} Friend Request 1111</button>
                                </form>
                                --}}
                            @endif

                            @else
                  
                          
                          @endif


                        @endforeach                    

                    @else
                       <p>No friend data available</p>
                    @endif

               @if($otherUser['status'] === 'pending')
 
                @elseif($otherUser['status'] == 'wait' )
{{--$otherUser--}}
                @elseif($otherUser['status'] == 'approved')
         
                @else
              {{-- 
                                <form action="{{ route('user.sendFriendRequest', ['friendId' => $otherUser->id]) }}" method="post">
                                    @csrf
                                    <button type="submit">Send {{ $otherUser->name }} Friend Request </button>
                                </form>
                 --}}
                @endif
                            
                           @if($otherUser->isFriend())    
                           
                           @elseif(!$otherUser->isFriend()) 
                             <form action="{{ route('user.sendFriendRequest', ['friendId' => $otherUser->id]) }}" method="post">
                                    @csrf
                                    <button type="submit">Send {{ $otherUser->name }} Friend Request </button>
                                </form>
                           @else
                           @endif
                        </li>
                        <hr>
                    @endif
                @endforeach
            </ul>
        @else
            <p>No other users found.</p>
        @endif

{{$users}}




@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif








    </div>

    </div>

    </div>
@endsection
