<!DOCTYPE html>
<html>
<head>
    <title>Google Maps Example</title>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script>
</head>
<body>
<div id="map" style="width: 100%; height: 500px;"></div>

<script>
    function initMap() {
        var data = {!! json_encode($data) !!};

        // Use the data from the API response to display the map
        var map = new google.maps.Map(document.getElementById('map'), {
            center: data.results[0].geometry.location,
            zoom: 15
        });

        // Add a marker to the map
        var marker = new google.maps.Marker({
            position: data.results[0].geometry.location,
            map: map
        });
    }
    google.maps.event.addDomListener(window, 'load', initMap);
</script>
</body>
</html>
