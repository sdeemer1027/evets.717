<!-- resources/views/dashboard/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">User Dashboard</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                     <div class="card-header">
                        <h5 class="card-title">Profile <a href="{{route('editProfile')}}" style="float:right;font-size: 13px;"><i class="fas fa-pencil-alt"></i>Edit Profile</h5> </a>
                        </div>
                    <div class="card-body">
                       
                        <!-- Add profile-related information here -->


                        @if($user)

                        @if($profileImage)
                            <img src="{{ Storage::url($profileImage->photo_path) }}" alt="Profile Image" style="width: 150px;border-radius: 25%;">
                           
                        @else
                            <p>No profile image found.</p>
                        @endif

                            <p>Name: {{ $user->name }}<br>
                                 {{ $user->fname }} 
                                  {{ $user->lname }}
                            </p>
                            <p>Address: {{ $user->address }}<br>
                                {{ $user->city }} ,  {{ $user->state }}<br> {{ $user->zip }}</p>

                            <p>Email: {{ $user->email }}</p>
                             <p>Phone: {{ $user->phone }}</p>
                            <!-- Add more user-related information as needed -->
                            {{-- $user --}}
                        @else
                            <p>No user found.</p>
                        @endif
                    </div>


















                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Pets</h5>
                        <!-- Add information related to user's pets here -->

                        @if($mypets->isEmpty())
                            <p>No pets found.</p>
                        @else
                            <ul>
                                @foreach($mypets as $pet)
                                    <li><a href="{{route('mypets.show',['id' => $pet->id])}}">{{ $pet->name }} </a>[ {{ $pet->species}} ] {{$pet->id}} 
@if($pet->user->id === auth()->user()->id) <!-- Check if the user is the owner -->
            <a href="{{ route('pets.edit', ['petId' => $pet->id]) }}" >Edit</a>
        @endif
                                    </li>

                                    {{--$pet--}}
                                @endforeach
                            </ul>
                        @endif

                    </div>
                </div>
            </div>







<div class="col-md-4">
                <div class="card">
                    <div class="card-body">


<h5 align="center">Friends</h5>
      <!-- Approved Friends -->
        <div>            
              <h5>Approved Friends</h5>
               {{--$me--}}
               @if($approvedFriends->count() > 0)
            <ul>
                @foreach($approvedFriends as $friend)
                @if($friend->user->id == $me)
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

        <!-- Sent Friend Requests -->
        <div>
            <h5>Received Friend Requests</h5>
               @if($receivedFriendRequests->count() > 0)
            <ul>{{--$receivedFriendRequests--}}
                @foreach($receivedFriendRequests as $request)
                    <li>{{--$request--}}
                        {{ $request->friend->name }} sent you a friend request.
                        @if($request->status === 'pending')
                            Pending {{$request->friend_id}} 
                        @elseif($request->status === 'wait')
                          

                            <form action="{{ route('user.acceptFriendRequest', ['friendId' => $request->friend->id]) }}" method="post">
                                @csrf
                                <button type="submit">Accept  {{$request->friend->name}} {{$request->friend->id}}</button>
                            </form>
                            @else
                          {{--   <a href="{{ route('user.profile', ['id' => $request->user->id]) }}">View Profile</a> --}}
                        @endif
                    </li>
                @endforeach
            </ul>
               @else
            <p>No friend requests found.</p>
               @endif

        </div>

        <!-- Received Friend Requests -->
        <div>
          
        <h5>Sent Friend Requests</h5>

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


         @if(auth()->user()->id == 1)                        
        <a href="{{ route('allUsers')}}">Find Friends --------</a> <br>
 @endif
    </div>
</div>
</div>

        </div>





 <div class="row">

  <div class="col-md-6">
        {{--   
                <div class="card">       
                    <div class="card-body">
                        <h5 class="card-title">Profile Image</h5>
                        @if($profileImage)
                            <img src="{{ Storage::url($profileImage->photo_path) }}" alt="Profile Image" style="max-width: 100%;border-radius: 25%;">
                        @else
                            <p>No profile image found.</p>
                        @endif
                    </div>                    
                </div>
        --}}
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Gallery Photos</h5>
      
                        @if($galleryPhotos->isNotEmpty())
                            <div class="row">
                                @foreach($galleryPhotos as $photo)
                                    <div class="col-md-4 mb-3">
                                    {{--$photo--}}
                                   
                                    @if($photo->is_profile=='1')
                                       <div class="mt-4" style="position: relative;">
                                           <img src="{{ Storage::url($photo->photo_path) }}" alt="Gallery Photo" style="max-width: 100%;">
                                       </div>
                                    @else
<!-- Delete Form -->

<form id="deleteForm" action="#" method="post" style="position: absolute; top: 0; right: 0; z-index: 100;">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal" onclick="setFormActionAndImage({{ $photo->id }}, '{{ Storage::url($photo->photo_path) }}')">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>


<!-- Make Profile Form -->
<form action="{{ route('makeProfile') }}" method="post" enctype="multipart/form-data" style="position: relative; display: inline-block; margin-top: 0px;">
    @csrf
    <div class="mt-4">
        <img src="{{ Storage::url($photo->photo_path) }}" alt="Gallery Photo" style="max-width: 100%;"><br>
        <input type="hidden" value="{{$photo->user_id}}" name="uid"> 
        <input type="hidden" value="{{$photo->id}}" name="id">
        <button type="submit" class="btn btn-primary" style="position: absolute; bottom: 0; width: 100%;">Make Profile</button>
    </div>
</form>


           
                                    @endif
                                    
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>No gallery photos found.</p>
                        @endif

                       
                    </div>
                      <div class="mt-4">
                        <form action="{{ route('upload.gallery.photo') }}" method="post" enctype="multipart/form-data" class="form-inline">
                           @csrf
                        <label for="galleryPhoto" class="mr-2">Upload Photo to your gallery:</label>
                        <input type="file" class="form-control-file mr-2" id="galleryPhoto" name="photo">
                        <button type="submit" class="btn btn-success">Upload</button>
                        </form>
                      </div>
                </div>
   </div>



  <div class="col-md-6">
               
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Pet Photos</h5>

                        @forelse($userPetsWithPhotos as $pet)
                            <h6 class="mt-3">{{ $pet->name }} Photos</h6>
                            @if($pet->photos->isNotEmpty())
                                <div class="row">
                                    @foreach($pet->photos as $photo)
                                        <div class="col-md-4 mb-3">
                                            <img src="{{ Storage::url($photo->photo_path) }}" alt="Pet Photo" style="max-width: 100%;">
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>No photos found for {{ $pet->name }}.</p>
                            @endif
                        @empty
                            <p>No pets found for the user.</p>
                        @endforelse
                    </div>
                </div>
   </div>

</div>













 <div class="row">
            <div class="col-md-6">
                <!-- ... existing code ... -->
{{-- 
                <form action="{{ route('upload.profile.image') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="profileImage">Upload Profile Image</label>
                        <input type="file" class="form-control-file" id="profileImage" name="photo">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
--}}
               
            </div>

            <div class="col-md-6">
                <!-- ... existing code ... -->
            </div>
        </div>











<!-- Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this photo? 
                               <img src="" alt="Photo" id="photoToDelete" style="max-width: 100%;">
  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="submitForm()">Delete</button>
            </div>
        </div>
    </div>
</div>



<script>
    function setFormAction(photoId) {
        document.getElementById('deleteForm').action = '/delete-gallery-photo/' + photoId;
    }
 function setFormActionAndImage(photoId, photoUrl) {
        document.getElementById('deleteForm').action = '/delete-gallery-photo/' + photoId;
        document.getElementById('photoToDelete').src = photoUrl;
    }

    function submitForm() {
        document.getElementById('deleteForm').submit();
    }
</script>

    </div>
@endsection
