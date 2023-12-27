@extends('layouts.app')

@section('content')
<div class="container">
    
 <h2>Admin Dashboard</h2>
 <div class="row">
   <div class="col-md-6">
     <div class="card">
        <div class="card-body">
            <h5 class="card-title">All Users</h5>
            <ul>
            @foreach($users as $user)
                <li><a href="{{ route('user.profile', ['id' => $user->id]) }}">{{ $user->name }} - {{ $user->email }} - {{ $user->zip }}</a></li>
            @endforeach
            </ul>
        </div>
     </div>
    </div>
       
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
              <h5 class="card-title"></h5>
              Vet Offices : {{$vetoffices}} <br>
              Groomers : {{$petgroomers}}<br>
                Kennels : {{$petkennels}}<br>
        </div>
      </div>
    </div>
</div>
 <div class="row">
   <div class="col-md-3">
     <div class="card">
        <div class="card-body">
            <h5 class="card-title">Categories</h5>
            {{-- Add Category link --}}
        @auth
            @if(auth()->user()->id == 1)
                <a href="{{ route('categories.create') }}">Add Category</a>
            @endif
        @endauth
        <hr>
            <ul>
           @foreach($categories as $category)
           <li>{{$category->name}}
            {{-- Edit link --}}
                    @auth
                        @if(auth()->user()->id == 1)
                            <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                        @endif
                    @endauth
            </li>
            @endforeach
            </ul>
        </div>
     </div>
    </div>
       
    <div class="col-md-9">
      <div class="card">
        <div class="card-body">
              <h5 class="card-title">All Articles</h5>
             
             {{-- <ul>
                                        @foreach($articles as $article)
                                          <li>{{ $article->title }}</li>
                                        @endforeach
                                        </ul>
                          --}}

<div>
	  <a href="{{ route('articles.create') }}" class="btn btn-success mb-2">New Article</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Created Date</th>
                         <th>Actions</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                             <td>{{ $article->category->name }}</td> <!-- Assuming articles have a 'category' relationship -->
                            <td>{{ $article->created_at->format('Y-m-d H:i:s') }}</td> <!-- Adjust the date format as needed -->
                          <td>
                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Edit</a>

                                <form method="POST" action="{{ route('articles.destroy', $article->id) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
                                </form>
                            </td>
                            <!-- Add more columns as needed -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>




        </div>
      </div>
    </div>
</div>


 





{{--$categories--}}


</div>
@endsection
