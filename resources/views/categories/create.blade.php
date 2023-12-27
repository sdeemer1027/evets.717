<!-- resources/views/categories/create.blade.php -->

@extends('layouts.app') <!-- Assuming you have a master layout, modify as needed -->

@section('content')
    <div class="container">
        <h2>Create New Category</h2>

        <form method="POST" action="{{ route('categories.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Add Category</button>
        </form>
    </div>
@endsection
