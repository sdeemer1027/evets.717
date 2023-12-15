<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


use App\Models\petgroomers;
use App\Models\vetoffices;
use App\Models\User;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

//use Illuminate\Support\Facades\Http;





class PetfinderController extends Controller
{




public function index()
    {
        return view('petfinder.index');
    }

    public function search(Request $request)
    {
        // Retrieve form data
        $zipCode = $request->input('zip_code');
        $petType = $request->input('pet_type');
        $gender = $request->input('gender');
        $size= $request->input('size');
        $age= $request->input('age');

 $selectedAges = $request->input('ages', []);
$age = implode(',', $selectedAges);
$selectedSizes = $request->input('sizes', []);
$size =implode(',', $selectedSizes);

//dd($selectedAges ,$age,$ageArray);

        // TODO: Implement Petfinder API search using the provided zip code and pet type

        // For now, just return a message
    //    return response()->json(['message' => "Searching for $petType in $zipCode"]);
    

// Your client credentials
$clientId = "t1opJPLAJR7L57H127bPJrVwbCtnGtryDR15FXP2kZrzmnMz2d";
$clientSecret = "8OF3QoESEAcMOEWXAOrXRvH5zDTs8jQEzo1OFPYJ";

// Set the token URL
$token_url = "https://api.petfinder.com/v2/oauth2/token";


 $environment = env('APP_ENV');

    // Use a different string based on the environment
    $yourString = ($environment === 'local') ? 'D:\wamp64\bin\php/cacert.pem' : '/var/www/html/blog/cacert.pem';

        // Set the token URL
        $tokenUrl = 'https://api.petfinder.com/v2/oauth2/token';

        // Set the grant type and form data
        $data = [
            'grant_type' => 'client_credentials',
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
        ];


$curl = curl_init();

// Set cURL options
curl_setopt_array($curl, [
    CURLOPT_URL => $token_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => http_build_query($data), // Send the form data
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/x-www-form-urlencoded",
    ],
    CURLOPT_CAINFO =>    $yourString,
]);



// Execute cURL request and get the response
$response = curl_exec($curl);

// Check for cURL errors
if (curl_errno($curl)) {
    echo 'Curl error: ' . curl_error($curl);
}

// Check the HTTP status code
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//echo 'HTTP Status Code: ' . $httpCode;

// Print the raw response content
//echo 'Raw Response: ' . $response;

// Decode the JSON response
$data = json_decode($response, true);

// Now, $data should contain the response data
//var_dump($data);



$access_token = $data['access_token'];



     // For now, just return a message
    //    return response()->json(['message' => "Searching for $petType in $zipCode"]);
    


//GET  9547012258    //shanon 
// 4:30 






// Close cURL session
curl_close($curl);



//GET https://api.petfinder.com/v2/types


/*
$api_url = "https://api.petfinder.com/v2/types";

$curl = curl_init();

// Set cURL options for the API request with the access token
curl_setopt_array($curl, [
    CURLOPT_URL => $api_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
 //   CURLOPT_POSTFIELDS => $data, // Send the form data
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer $access_token",
    ],
//CURLOPT_CAINFO => 'D:\wamp64\bin\php/cacert.pem',
//CURLOPT_CAINFO => '/var/www/html/blog/cacert.pem',
//CURLOPT_CAINFO => '/cacert.pem',
     CURLOPT_CAINFO =>    $yourString,

]);

// Execute cURL request and get the response
$type_response = curl_exec($curl);

$type_response = json_decode($type_response,true);

//dd($api_response['organizations']);


$type_response = collect($type_response['types']);


// Close cURL session
curl_close($curl);

*/

 
// Now, use the obtained access token in a new cURL request for the API endpoint
$api_url = "https://api.petfinder.com/v2/animals?location=".$zipCode."&type=$petType&distance=25&limit=100&gender=".$gender."&age=".$age."&size=".$size; //{CATEGORY}/{ACTION}?{parameter_1}={value_1}&{parameter_2}={value_2}";



$curl = curl_init();

// Set cURL options for the API request with the access token
curl_setopt_array($curl, [
    CURLOPT_URL => $api_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
 //   CURLOPT_POSTFIELDS => $data, // Send the form data
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer $access_token",
    ],
//CURLOPT_CAINFO => 'D:\wamp64\bin\php/cacert.pem',
//CURLOPT_CAINFO => '/var/www/html/blog/cacert.pem',
//CURLOPT_CAINFO => '/cacert.pem',
     CURLOPT_CAINFO =>    $yourString,

]);

// Execute cURL request and get the response
$api_response = curl_exec($curl);

// Check for cURL errors
if (curl_errno($curl)) {
//    echo 'Curl error: ' . curl_error($curl);
}

// Close cURL session
curl_close($curl);







$api_response = json_decode($api_response,true);

//dd($api_response['organizations']);


$api_response = collect($api_response['animals']);



$type_response = '';

//dd($access_token,$petType,$zipCode,$api_response);

    // Redirect to the results page with parameters
    //    return redirect()->route('petfinder.results', [
 return view('petfinder.results', [
            'zip_code' => $zipCode,
            'pet_type' => $petType,
            'api_response' => $api_response,
            'type_response' => $type_response,
        ]);
    }

    public function results(Request $request)
    {
        // Retrieve parameters from the URL
        $zipCode = $request->input('zip_code');
        $petType = $request->input('pet_type');

        // TODO: Implement logic to fetch and display Petfinder API search results

        // For now, just return the view with parameters
        return view('petfinder.results', [
            'zip_code' => $zipCode,
            'pet_type' => $petType,

        ]);
    }




    public function show($id)
    {

//dd($id);

// Your client credentials
$clientId = "t1opJPLAJR7L57H127bPJrVwbCtnGtryDR15FXP2kZrzmnMz2d";
$clientSecret = "8OF3QoESEAcMOEWXAOrXRvH5zDTs8jQEzo1OFPYJ";

// Set the token URL
$token_url = "https://api.petfinder.com/v2/oauth2/token";

 $environment = env('APP_ENV');

    // Use a different string based on the environment
    $yourString = ($environment === 'local') ? 'D:\wamp64\bin\php/cacert.pem' : '/var/www/html/blog/cacert.pem';

        // Set the token URL
        $tokenUrl = 'https://api.petfinder.com/v2/oauth2/token';

        // Set the grant type and form data
        $data = [
            'grant_type' => 'client_credentials',
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
        ];


$curl = curl_init();

// Set cURL options
curl_setopt_array($curl, [
    CURLOPT_URL => $token_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => http_build_query($data), // Send the form data
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/x-www-form-urlencoded",
    ],
    CURLOPT_CAINFO =>    $yourString,
]);



// Execute cURL request and get the response
$response = curl_exec($curl);

// Check for cURL errors
if (curl_errno($curl)) {
    echo 'Curl error: ' . curl_error($curl);
}

// Check the HTTP status code
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

// Decode the JSON response
$data = json_decode($response, true);

$access_token = $data['access_token'];

// Close cURL session
curl_close($curl);
//GET https://api.petfinder.com/v2/animals/{id}
 
// Now, use the obtained access token in a new cURL request for the API endpoint
$api_url = "https://api.petfinder.com/v2/animals/$id";



$curl = curl_init();

// Set cURL options for the API request with the access token
curl_setopt_array($curl, [
    CURLOPT_URL => $api_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
 //   CURLOPT_POSTFIELDS => $data, // Send the form data
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer $access_token",
    ],
//CURLOPT_CAINFO => 'D:\wamp64\bin\php/cacert.pem',
//CURLOPT_CAINFO => '/var/www/html/blog/cacert.pem',
//CURLOPT_CAINFO => '/cacert.pem',
     CURLOPT_CAINFO =>    $yourString,

]);

// Execute cURL request and get the response
$api_response = curl_exec($curl);

// Check for cURL errors
if (curl_errno($curl)) {
//    echo 'Curl error: ' . curl_error($curl);
}

// Close cURL session
curl_close($curl);







$api_response = json_decode($api_response,true);

//dd($api_response['organizations']);


$api_response = collect($api_response['animal']);

//dd($api_response);


 return view('petfinder.show', [
            'api_response' => $api_response,
            

        ]);

    }





    public function getAccessToken()
    {
        // Your Petfinder API credentials
  //      $clientId = config('petfinder.client_id');
  //      $clientSecret = config('petfinder.client_secret');


// Your client credentials
$clientId = "t1opJPLAJR7L57H127bPJrVwbCtnGtryDR15FXP2kZrzmnMz2d";
$clientSecret = "8OF3QoESEAcMOEWXAOrXRvH5zDTs8jQEzo1OFPYJ";

// Set the token URL
$token_url = "https://api.petfinder.com/v2/oauth2/token";


 $environment = env('APP_ENV');

    // Use a different string based on the environment
    $yourString = ($environment === 'local') ? 'D:\wamp64\bin\php/cacert.pem' : '/var/www/html/blog/cacert.pem';

        // Set the token URL
        $tokenUrl = 'https://api.petfinder.com/v2/oauth2/token';

        // Set the grant type and form data
        $data = [
            'grant_type' => 'client_credentials',
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
        ];


$curl = curl_init();

// Set cURL options
curl_setopt_array($curl, [
    CURLOPT_URL => $token_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => http_build_query($data), // Send the form data
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/x-www-form-urlencoded",
    ],
    CURLOPT_CAINFO =>    $yourString,
]);



// Execute cURL request and get the response
$response = curl_exec($curl);

// Check for cURL errors
if (curl_errno($curl)) {
    echo 'Curl error: ' . curl_error($curl);
}

// Check the HTTP status code
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//echo 'HTTP Status Code: ' . $httpCode;

// Print the raw response content
//echo 'Raw Response: ' . $response;

// Decode the JSON response
$data = json_decode($response, true);

// Now, $data should contain the response data
//var_dump($data);



$access_token = $data['access_token'];




        return response()->json(['access_token' => $data['access_token']]);
    }

    // Add more methods for interacting with the Petfinder API as needed











}
