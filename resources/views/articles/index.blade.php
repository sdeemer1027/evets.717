@extends('layouts.app')

@section('content')
<div class="container">
    


 <h2>All Articles</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->category->name }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $article->image) }}" alt="Article Image" style="max-width: 100px;">
                    </td>
                    <td>
                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

















{{--
$articles
@foreach($articles as $article)

<h5><a href="{{route('articles.show', $article->id) }}">{{$article->title}}</a> </h5>

@endforeach
--}}





</div>
@endsection
