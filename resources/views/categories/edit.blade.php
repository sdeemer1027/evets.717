<!-- resources/views/categories/edit.blade.php -->

@extends('layouts.app') <!-- Assuming you have a master layout, modify as needed -->

@section('content')
    <div class="container">
        <h2>Edit Category</h2>

        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
@endsection
