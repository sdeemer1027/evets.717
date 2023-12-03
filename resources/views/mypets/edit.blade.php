<!-- resources/views/pets/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Edit Pet</h1>

        <!-- Your edit form goes here -->
         <form action="{{ route('pets.update', ['petId' => $pet->id]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Pet Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $pet->name }}">
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Pet Age</label>
                <input type="text" class="form-control" id="age" name="age" value="{{ $pet->age }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Pet</button>
        </form>
    </div>
@endsection
