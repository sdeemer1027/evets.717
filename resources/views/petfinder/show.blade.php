
@extends('layouts.app')

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

@section('content')
<div class="container">



    <h1>Petfinder Search Results</h1>


    <form action="{{ route('petfinder.search') }}" method="get">
        @csrf
        <label for="zip_code">Enter Zip Code:</label>
        <input type="text" id="zip_code" name="zip_code" value="" required>
        <br> 
        <label for="pet_type">Select Pet Type:</label>
        <select id="pet_type" name="pet_type" required>
            <option value="dog">Dog</option>
            <option value="cat">Cat</option>
            <option value="rabbit">Rabbit</option>
            <option value="small-furry">Small & Furry</option>
            <option value="horse">Horse</option>
            <option value="bird">Bird</option>
            <option value="scales-fins-other">Scales, Fins & Other</option>
            <option value="barnyard">Barnyard</option>
            <!-- Add more options for other pet types as needed -->
        </select>
        <label for="gender">Select Pet Gender:</label>
<select id='gender' name='gender'>
    <option value=''>Female/Male</option>
    <option value='female'>Female</option>
    <option value='male'>Male</option>
</select>



<br>

 <label for="size">Select Pet size:</label>
 {{-- 
<select id='size' name='size'>
    <option value=''>Select</option>
    <option value='small'>small</option>
    <option value='medium'>medium</option>
    <option value='large'>large</option>
    <option value='xlarge'>xlarge</option>
</select>
--}}




<input type="checkbox" id="size_small" name="sizes[]" value="small">
<label for="size_small">Small</label>

<input type="checkbox" id="size_medium" name="sizes[]" value="medium">
<label for="size_medium">Medium</label>

<input type="checkbox" id="size_large" name="sizes[]" value="large">
<label for="size_large">Large</label>

<input type="checkbox" id="size_xlarge" name="sizes[]" value="xlarge">
<label for="size_xlarge">X-Large</label>



<br>

<label for="age">Select Pet age:</label>

<input type="checkbox" id="baby" name="ages[]" value="baby">
<label for="baby">Baby</label>

<input type="checkbox" id="young" name="ages[]" value="young">
<label for="young">Young</label>

<input type="checkbox" id="adult" name="ages[]" value="adult">
<label for="adult">Adult</label>

<input type="checkbox" id="senior" name="ages[]" value="senior">
<label for="senior">Senior</label>

<br>
        <button type="submit">Search</button>
    </form>
 
<BR><BR>

<div class="row">
   <div class="card col-lg-12">
                <div class="card-header"><h4>Meet {{$api_response['name']}}
 </h4> 
               









                </div>
                <div class="card-body">

   @foreach($api_response['photos'] as $pic)
                             @if (isset($pic['full']))
                               <p><img src="{{$pic['full']}}" style="max-width: 250px; border-radius: 10px;"></p>
                             @elseif (isset($pic['large']))
                               <p><img src="{{$pic['large']}}" style="max-width: 250px; border-radius: 10px;"></p>
                             @elseif (isset($pic['medium']))
                               <p><img src="{{$pic['medium']}}" style="max-width: 250px; border-radius: 10px;"></p>
                             @elseif (isset($pic['small']))
                               <p><img src="{{$pic['small']}}" style="max-width: 250px; border-radius: 10px;"></p>
                             @else
                               <p>No image sizes available.</p>
                             @endif
                            @endforeach

 <div>
       @if ($api_response['breeds']['primary'])
    <p>Primary Breed: {{ $api_response['breeds']['primary'] }}</p>
@endif

@if ($api_response['breeds']['secondary'])
    <p>Secondary Breed: {{ $api_response['breeds']['secondary'] }}</p>
@endif

@if ($api_response['breeds']['mixed'])
    <p>Mixed Breed: {{ $api_response['breeds']['mixed'] }}</p>
@endif

@if ($api_response['breeds']['unknown'])
    <p>Unknown Breed: {{ $api_response['breeds']['unknown'] }}</p>
@endif

    </div>
<div>


 "colors" => 

       @if ($api_response['colors']['primary'])
    Primary Color: {{ $api_response['colors']['primary'] }}<br>
@endif

@if ($api_response['colors']['secondary'])
    Secondary Color: {{ $api_response['colors']['secondary'] }}<br>
@endif

@if ($api_response['colors']['tertiary'])
     {{ $api_response['colors']['tertiary'] }}<br>
@endif

    </div>

    "age" => {{ $api_response['age'] }}<br>
    "gender" => {{ $api_response['gender'] }}<br>
    "size" => {{ $api_response['size'] }}<br>
    "coat" => {{ $api_response['coat'] }}<br>


@if ($api_response['attributes']['spayed_neutered'])
   spayed_neutered=>  {{ $api_response['attributes']['spayed_neutered'] }}<br>
@endif
@if ($api_response['attributes']['house_trained'])
   house_trained=>  {{ $api_response['attributes']['house_trained'] }}<br>
@endif
@if ($api_response['attributes']['declawed'])
   declawed  {{ $api_response['attributes']['declawed'] }}<br>
@endif

@if ($api_response['attributes']['special_needs'])
 special_needs    {{ $api_response['attributes']['special_needs'] }}<br>
@endif
@if ($api_response['attributes']['shots_current'])
   shots_current  {{ $api_response['attributes']['shots_current'] }}<br>
@endif

    

@if ($api_response['environment']['children'])
   children  {{ $api_response['environment']['children'] }}<br>
@endif
@if ($api_response['environment']['dogs'])
  dogs   {{ $api_response['environment']['dogs'] }}<br>
@endif
@if ($api_response['environment']['cats'])
  cats   {{ $api_response['environment']['cats'] }}<br>
@endif


@if ($api_response['description'])
   description  {{ $api_response['description'] }}<br>
@endif

 "status" => {{ $api_response['status'] }}<br>
    "status_changed_at" => {{ $api_response['status_changed_at'] }}<br>
    "published_at" => {{ $api_response['published_at'] }}<br>


@if ($api_response['contact']['email'])
 email    {{ $api_response['contact']['email'] }}<br>
@endif
@if ($api_response['contact']['phone'])
  phone   {{ $api_response['contact']['phone'] }}<br>
@endif

@if ($api_response['contact']['address']['address1'])
  address   {{ $api_response['contact']['address']['address1'] }}<br>
@endif
@if ($api_response['contact']['address']['city'])
  city   {{ $api_response['contact']['address']['city'] }}<br>
@endif
@if ($api_response['contact']['address']['state'])
  state   {{ $api_response['contact']['address']['state'] }}<br>
@endif
@if ($api_response['contact']['address']['postcode'])
  postcode   {{ $api_response['contact']['address']['postcode'] }}<br>
@endif
@if ($api_response['contact']['address']['country'])
  country   {{ $api_response['contact']['address']['country'] }}<br>
@endif




<div id="map" style="height: 600px;"></div>

<script>
    // Replace 'Your Address' with the actual address you want to geocode
    var address = '{{ $api_response['contact']['address']['address1'] }} {{ $api_response['contact']['address']['city'] }} {{ $api_response['contact']['address']['state'] }} {{ $api_response['contact']['address']['postcode'] }}';

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
                    .bindPopup('{{ $api_response['contact']['address']['address1'] }} {{ $api_response['contact']['address']['city'] }} {{ $api_response['contact']['address']['state'] }} {{ $api_response['contact']['address']['postcode'] }}')
                    .openPopup();
            } else {
                console.error('Invalid address or no results found.');
            }
        })
        .catch(error => console.error('Error fetching data:', error));
</script>





{{-- 

<pre>



    
    
    "tags" => []
    "name" => "ZION"

    "organization_animal_id" => "A674720"

    "videos" => []
   
    "distance" => null
   
    "_links" => array:3 [▼
      "self" => array:1 [▼
        "href" => "/v2/animals/69790919"
      ]
      "type" => array:1 [▼
        "href" => "/v2/types/small-furry"
      ]
      "organization" => array:1 [▼
        "href" => "/v2/organizations/fl286"
      ]
    ]
  ]
</pre>




--}}





</div>
</div>
{{--$api_response--}}

</div>
</div>

@endsection
