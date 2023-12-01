<!-- resources/views/dashboard/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">User Dashboard</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profile</h5>
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
                            <!-- Add more user-related information as needed -->
                            {{-- $user --}}
                        @else
                            <p>No user found.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Pets</h5>
                        <!-- Add information related to user's pets here -->

                        @if($mypets->isEmpty())
                            <p>No pets found.</p>
                        @else
                            <ul>
                                @foreach($mypets as $pet)
                                    <li>{{ $pet->name }} [ {{ $pet->species}} ]</li>

                                    {{--$pet--}}
                                @endforeach
                            </ul>
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
                                        <img src="{{ Storage::url($photo->photo_path) }}" alt="Gallery Photo" style="max-width: 100%;">
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>No gallery photos found.</p>
                        @endif
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

                <form action="{{ route('upload.profile.image') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="profileImage">Upload Profile Image</label>
                        <input type="file" class="form-control-file" id="profileImage" name="photo">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>

                <form action="{{ route('upload.gallery.photo') }}" method="post" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label for="galleryPhoto">Upload Gallery Photo</label>
                        <input type="file" class="form-control-file" id="galleryPhoto" name="photo">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>

            <div class="col-md-6">
                <!-- ... existing code ... -->
            </div>
        </div>

















    </div>
@endsection
