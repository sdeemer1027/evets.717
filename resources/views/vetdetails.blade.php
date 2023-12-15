@extends('layouts.app')
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

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
        </div>{{--$vetdetails--}}

{{--

@foreach($vetdetails as $index => $vetdetail)
    <!-- Initialize OpenStreetMap with Leaflet -->
    <div id="map_{{ $index }}" style="height: 400px;">{{ $index }} [{{ $vetdetail->lat }}, {{ $vetdetail->lng }}]</div>
    <script>
        var map_{{ $index }} = L.map('map_{{ $index }}').setView([{{ $vetdetail->lat }}, {{ $vetdetail->lng }}], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map_{{ $index }});

        // Replace with the actual coordinates of the address
        L.marker([{{ $vetdetail->lat }}, {{ $vetdetail->lng }}]).addTo(map_{{ $index }})
            .bindPopup('Vet\'s location.')


            .openPopup();
    </script>
@endforeach
--}}


{{$vetdetails[0]->address}} {{$vetdetails[0]->city}},{{$vetdetails[0]->state}}.{{$vetdetails[0]->zip}}<br>
                   

{{$vetdetails[0]->lat}}   {{$vetdetails[0]->lng}}



<div id="map" style="height: 400px;"></div>

<script>
    // Replace 'Your Address' with the actual address you want to geocode
    var address = '{{$vetdetails[0]->address}} {{$vetdetails[0]->city}},{{$vetdetails[0]->state}}.{{$vetdetails[0]->zip}}';

    // Use Nominatim to geocode the address
    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
        .then(response => response.json())
        .then(data => {
            // Check if a valid result is obtained
            if (data.length > 0) {
                var map = L.map('map').setView([data[0].lat, data[0].lon], 30);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                L.marker([data[0].lat, data[0].lon]).addTo(map)
                    .bindPopup('{{$vetdetail->name}}<br>{{$vetdetails[0]->address}} {{$vetdetails[0]->city}},{{$vetdetails[0]->state}}.{{$vetdetails[0]->zip}}')
                    .openPopup();
            } else {
                console.error('Invalid address or no results found.');
            }
        })
        .catch(error => console.error('Error fetching data:', error));
</script>

















    </div>
</div>










@endsection

