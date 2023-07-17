<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GoogleMaps\GoogleMaps;

class MapController extends Controller
{
    public function index()
    {
        // Create a new GoogleMaps instance
        $googleMaps = new GoogleMaps(env('GOOGLE_MAPS_API_KEY'));

        // Use the GoogleMaps instance to perform API requests
        $response = $googleMaps->load('geocoding')
            ->setParam([
                'address' => '1600 Amphitheatre Parkway, Mountain View, CA',
                'components' => 'country:US',
            ])
            ->get();

        // Handle the API response
        $data = json_decode($response);

        return view('map', compact('data'));
    }
}
