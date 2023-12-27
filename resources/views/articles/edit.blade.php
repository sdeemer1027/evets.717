@extends('layouts.app')

@section('content')
<div class="container">
    



  <h2>Edit Article</h2>
        <form method="post" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put') <!-- Use the PUT method for updates -->

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $article->title }}" required>
            </div>
            
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" required>{{ $article->content }}</textarea>
            </div>


 <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
             
<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control-file">
</div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>





</div>
@endsection
