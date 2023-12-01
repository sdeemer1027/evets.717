<!-- resources/views/pet_photos/create.blade.php -->

@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Upload Photo for {{ $mypet->name }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pet_photos.store', $mypet->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="photo">Select Photo:</label>
            <input type="file" name="photo" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Upload Photo</button>
    </form>
</div>

@endsection
