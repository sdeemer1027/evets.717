@extends('layouts.app')
<style>
          .scrolling-wrapper {
            overflow-x: hidden;
            white-space: nowrap;
            position: relative;
        }

        .scrolling-content {
            display: inline-flex;
            transition: transform 0.5s ease-in-out;
        }

        .scrolling-item {
            flex: 0 0 auto;
            margin-right: 15px; /* Adjust spacing between images */
        }

        .scroll-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .scroll-left {
            left: 0;
        }

        .scroll-right {
            right: 0;
        }
    </style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{--$latestPetPhotos--}}
  <div class="container mt-5">
        <h1 class="text-center mb-4">The last 20 images of the Pet Photo Gallery</h1>
        <div class="scrolling-wrapper">
            <div class="scrolling-content" id="scrollingContent">
                @foreach($latestPetPhotos as $photo)
                    <div class="scrolling-item">
                        <img src="{{ Storage::url( $photo->photo_path) }}" alt="Pet Photo" style="width: 150px; object-fit: cover;">
                    </div>
                @endforeach
            </div>

            <div class="scroll-button scroll-left" onclick="scrollImages(-1)">&lt;</div>
            <div class="scroll-button scroll-right" onclick="scrollImages(1)">&gt;</div>
        </div>
    </div>


            <div class="card">
                <div class="card-header">Veterinary Practice (Total: {{$officescount}})</div>
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
                <div class="card-body">{{-- 
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif           --}}
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


<script>
       let currentIndex = 0;

        function scrollImages(direction) {
            const scrollingContent = document.getElementById('scrollingContent');
            const itemWidth = scrollingContent.firstElementChild.clientWidth + 15; // Width + margin-right

            currentIndex += direction;

            if (currentIndex < 0) {
                currentIndex = scrollingContent.children.length - 1;
            } else if (currentIndex >= scrollingContent.children.length) {
                currentIndex = 0;
            }

            scrollingContent.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
        }

        function autoScroll() {
            setInterval(() => {
                scrollImages(1);
            }, 3000);
        }

        // Start automatic scrolling
        autoScroll();
    </script>
@endsection
