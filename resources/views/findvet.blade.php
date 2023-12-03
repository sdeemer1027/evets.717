@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           <div class="card">
                <div class="card-header">Veterinary Practice (Total: {{$officescount}}) in a 10 mile radius</div>
                    @if($user->zip)
                <div class="card-header">
<form action="/search/{{$user->zip}}{{$zip}}" method="get">
                    Find a Vet  in your area               
                 <a href="{{ route('searchvet', $user->zip) }}">{{$user->zip}}</a> Or 
                search a zipcode  
<div class="row">
    <div class="col">
        <input type="text" class="form-control" id="zip" name="zip" value="{{ $zip ?? '' }}" placeholder="Enter Zip Code">
    </div>
    <div class="col">
        <button type="submit" class="btn btn-primary">Update Pet</button>
    </div>
</div>
    @csrf
</form>               
                </div>
                    @endif
                <div class="card-body">

                     Vets ready and waiting
                        <BR><BR>
                        {{--$locations--}}
                        <table class="table  table-striped">
                            <tr>
                                <td>Name</td>
                                <td>phone</td>
                                <td>address</td>
                                <td>city</td>
                                <td>state</td>
                                <td>Zip</td>

                            </tr>

                        @foreach($locations as $office)
                            <tr>
                                <td><a href="{{route('vetdetails',$office->id)}}">{{$office->name}}</a></td>
                                <td>{{$office->phone}}</td>
                                <td>{{$office->address}}</td>
                                <td>{{$office->city}}</td>
                                <td>{{$office->state}}</td>
                                <td>{{$office->zip}}</td>
                            </tr>
                        @endforeach
                        </table>

                        <hr>

{{--$locations--}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
