<!-- resources/views/mypets/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">

    <h1>My Pets</h1>

    <p><a href="{{ route('mypets.create') }}">Add a New Pet</a></p>

<table class="table table-dark table-striped">


 <thead>
    <tr>
      <th scope="col">last Pic</th>
      <th scope="col">name</th>
      <th scope="col">age</th>
      <th scope="col">updated</th>
    </tr>
  </thead>
  <tbody>

    @foreach($mypets as $mypet)

<tr>
      <td scope="row">@if($mypet->latestPhoto)
        {{-- Storage::url($mypet->latestPhoto->photo_path) --}}
        <img src="{{ Storage::url($mypet->latestPhoto->photo_path) }}" alt="Latest Pet Photo" style="max-height: 75px; border-radius: 25%;">
        @else
         [No photos]
    @endif</td>
      <td><a href="{{ route('mypets.show', $mypet->id) }}">
        
        {{ $mypet->name }}</a></td>
      <td> {{ $mypet->age }}</td>
      <td> {{ $mypet->updated_at }}</td>
    </tr>
{{--$mypet--}}
       
    @endforeach


</table>










</div>

@endsection
