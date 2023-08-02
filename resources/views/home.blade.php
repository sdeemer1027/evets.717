@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <BR><BR>
                   {{--  we have {{$offices->count()--}} Vets ready and waiting
                        <BR><BR>
                        <table class="table table-dark">
                            <tr>
                                <td>Name</td>
                                <td>phone</td>
                                <td>address</td>
                                <td>city</td>
                                <td>state</td>
                                <td>Zip</td>

                            </tr>

                        @foreach($offices as $office)


                            <tr>
                                <td>{{$office->name}}</td>
                                <td>{{$office->phone}}</td>
                                <td>{{$office->address}}</td>
                                <td>{{$office->city}}</td>
                                <td>{{$office->state}}</td>
                                <td>{{$office->zip}}</td>

                            </tr>

                        @endforeach
                        </table>
                        <hr>
                        {{$offices}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
