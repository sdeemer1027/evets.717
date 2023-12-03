@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach($vetdetails as $vetdetail)
           <div class="card">
                <div class="card-header">{{$vetdetail->name}}</div>
                  
                <div class="card-body">
                    Address: {{$vetdetail->address}}<br>
                    City: {{$vetdetail->city}}<br>
                    State: {{$vetdetail->state}}<br>
                    Zip: {{$vetdetail->zip}}<br>
                    Phone: {{$vetdetail->phone}}<hr>
                    Description:<BR>
                    {{$vetdetail->description}}





                </div>
            </div>
            @endforeach
        </div>{{$vetdetails}}


    </div>
</div>





@foreach($vetdetails as $index => $vetdetail)
    <!-- Initialize Leaflet map -->
    <div id="map_{{ $index }}" style="height: 400px;">{{ $index }} [{{ $vetdetail->lat }}, {{ $vetdetail->lng }}]</div>
    <script>
        // Replace with the coordinates of the address
        var map_{{ $index }} = L.map('map_{{ $index }}').setView([{{ $vetdetail->lat }}, {{ $vetdetail->lng }}], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map_{{ $index }});

        // Replace with the actual coordinates of the address
        L.marker([{{ $vetdetail->lat }}, {{ $vetdetail->lng }}]).addTo(map_{{ $index }})
            .bindPopup('Your pet\'s location.')
            .openPopup();
    </script>
@endforeach







@endsection

