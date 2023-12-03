<!-- resources/views/mypets/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">

<div class="card">
                    <div class="card-body">
                        <h1 class="card-title">{{ $mypet->name }}</h1>

       <!-- Add a link to upload a new photo -->
    <p><a href="{{ route('pet_photos.create', $mypet->id) }}">Add a Photo</a></p>

    <p>Species: {{ $mypet->species }}</p>
    <p>Age: {{ $mypet->age }}</p>

                    </div>
                </div>

@if($allOwnerDetails)
    @if($allOwnerDetails->pet_id == $mypet->id)
<div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Owner Details</h1>

       @if($allOwnerDetails->name)
         UserName :  {{$ownerinfo->name}} <br>
       @endif
       @if($allOwnerDetails->fname)
        First Name : {{$ownerinfo->fname}} <br>
       @endif
       @if($allOwnerDetails->lname)
        Last Name : {{$ownerinfo->lname}} <br>
       @endif
       @if($allOwnerDetails->email)
         Email : {{$ownerinfo->email}} <br>
       @endif
       @if($allOwnerDetails->phone)
          {{$ownerinfo->phone}} <br>
       @endif
       @if($allOwnerDetails->address)
          {{$ownerinfo->address}}<br>
       @endif
       @if($allOwnerDetails->city)
          {{$ownerinfo->city}}<br>
       @endif
       @if($allOwnerDetails->state)
          {{$ownerinfo->state}}<br>
       @endif
       @if($allOwnerDetails->zip)
          {{$ownerinfo->zip}}<br>
       @endif


                    </div>
                </div>







{{--$ownerinfo}}
<hr>
{{$allOwnerDetails}}


{{$allOwnerDetails--}}
@endif
<HR>

 @endif

<table class="table table-dark table-striped">

     @if($photos->isNotEmpty())
        <h2>Photos</h2>  
 <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Delete</th>     
    </tr>
  </thead>
  <tbody>
  
        @foreach($photos as $photo)            
   <tr>
      <td scope="row">  <img src="{{ Storage::url($photo->photo_path) }}" alt="Pet Photo"  data-toggle="modal" data-target="#photoModal{{ $photo->id }}" style="max-height: 75px; border-radius: 25%;">

  </td>
    <td> Delete    <button class="btn btn-danger delete-photo" data-photo-id="{{ $photo->id }}">Delete</button>
  </td>
    </tr>

 <!-- Modal -->
    <div class="modal fade" id="photoModal{{ $photo->id }}" tabindex="-1" role="dialog" aria-labelledby="photoModalLabel{{ $photo->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="photoModalLabel{{ $photo->id }}">Pet Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ Storage::url($photo->photo_path) }}" alt="Pet Photo" style="width: 100%;">
                </div>
            </div>
        </div>
    </div>
        @endforeach













</tbody>
</table>
    @else
        <p>No photos available for this pet.</p>
    @endif
         

</div>


<!-- JavaScript to handle image deletion -->
<script>
    $(document).ready(function () {
        $('.delete-photo').click(function () {
            var photoId = $(this).data('photo-id');

            // Show confirmation dialog
            if (confirm('Are you sure you want to delete this photo? '+ photoId)) {
                // Send AJAX request to delete the photo
                $.ajax({
                    url: '/delete-photo/' + photoId, // Update the route accordingly
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        // Refresh the page or update the DOM as needed
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
@endsection


