@extends('layouts.app')

@section('content')
<div class="container">
    

        <h2>Create Article</h2>
        <form method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" required></textarea>
            </div>
 <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        {{--     --}}

<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control-file">
</div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>







</div>
@endsection
