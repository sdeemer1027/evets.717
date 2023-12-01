<!-- resources/views/mypets/create.blade.php -->

@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Add a New Pet</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mypets.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="species">Species:</label>
            <input type="text" name="species" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" name="age" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Pet</button>
    </form>
</div>

@endsection
