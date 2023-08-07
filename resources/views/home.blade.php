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
                        {{--$user--}}
                    <BR><BR>
                     Vets ready and waiting
                        <BR><BR>
                        <table class="table  table-striped">
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
{{--
                        <table class="table  table-striped">
                            <tr>
                                <td>Name</td>
                                <td>phone</td>
                                <td>address</td>
                                <td>city</td>
                                <td>state</td>
                                <td>Zip</td>

                            </tr>

                            @foreach($petgroomers as $petgroomer)
                                <tr>
                                    <td>{{$petgroomer->name}}</td>
                                    <td>{{$petgroomer->phone}}</td>
                                    <td>{{$petgroomer->address}}</td>
                                    <td>{{$petgroomer->city}}</td>
                                    <td>{{$petgroomer->state}}</td>
                                    <td>{{$petgroomer->zip}}</td>
                                </tr>
                            @endforeach
                        </table>
--}}
                        <hr>

                 we have   <strong> {{$petgroomers->count()}} </strong> Groomers ready with the Clippers and Bath


                        {{--$pets--}}



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
