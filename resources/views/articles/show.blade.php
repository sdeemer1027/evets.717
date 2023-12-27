@extends('layouts.app')

@section('content')
<div class="container">
    


  <h2>{{ $article->title }}</h2>
        <p>{!! $article->content !!}</p>
        
        @if ($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="Article Image"  style="max-width: 300px;">
        @endif
        
      


</div>
@endsection
