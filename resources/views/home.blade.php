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
                        @foreach($offices as $office)
                        {{$office->name}}<br>
                        @endforeach
                        <hr>
                        {{$offices}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
