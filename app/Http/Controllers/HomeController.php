<?php

namespace App\Http\Controllers;

use App\Models\petgroomers;
use App\Models\vetoffices;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

use Illuminate\Support\Facades\Http;









use App\Models\PetPhoto; // Make sure to import the PetPhoto class

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

$zip ='';
//$user = '';
        if (Auth::check()) {
            // User is logged in
            // You can retrieve user information using the Auth facade
            $user = Auth::user();
            $uzip = $user->zip;
            // Now you can access user properties like $user->name, $user->email, etc.
        } else {
            // User is not logged in
            // Handle the scenario where the user is not authenticated.
            $user = '';
        }
     //   dd($uzip,$user);
        if($uzip){
    //        $offices = vetoffices::where('zip', $uzip)->paginate(15);
        }else {

   //         $offices = vetoffices::where('id', '>', '0')->paginate(15);
        }

        $offices = vetoffices::where('id', '>', '0')->paginate(15);
         $officescount = vetoffices::where('id', '>', '0')->count();
        $petgroomers= petgroomers::where('id','>','0')->get();//->paginate(15);
//$petgroomers='';
        $pets= petgroomers::where('id','>','0')->get();

 // Fetch the latest 20 pet pictures
        $latestPetPhotos = PetPhoto::latest()->take(20)->get();

 if($user->id == 1){
    $allusers = User::select()->get();
 }else{
     $allusers = '';
 }



$curl = curl_init();

// Your client credentials
$client_id = "t1opJPLAJR7L57H127bPJrVwbCtnGtryDR15FXP2kZrzmnMz2d";
$client_secret = "8OF3QoESEAcMOEWXAOrXRvH5zDTs8jQEzo1OFPYJ";

// Set the token URL
$token_url = "https://api.petfinder.com/v2/oauth2/token";

// Set the grant type and form data
$data = [
    'grant_type' => 'client_credentials',
    'client_id' => $client_id,
    'client_secret' => $client_secret,
];
// Retrieve the value of APP_ENV from the .env file
    $environment = env('APP_ENV');

    // Use a different string based on the environment
    $yourString = ($environment === 'local') ? 'D:\wamp64\bin\php/cacert.pem' : '/var/www/html/blog/cacert.pem';

    // Now you can use $yourString as needed in your controller logic
    // For example, you can pass it to a view or return it as part of a JSON response

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








// Close cURL session
curl_close($curl);

// Now, use the obtained access token in a new cURL request for the API endpoint
$api_url = "https://api.petfinder.com/v2/organizations?location=".$uzip."&distance=25&limit=100"; //{CATEGORY}/{ACTION}?{parameter_1}={value_1}&{parameter_2}={value_2}";



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


$api_response = collect($api_response['organizations']);


// https://www.yellowpages.com/search?search_terms=pet+walker&geo_location_terms=33020



        return view('home', compact('offices','user','petgroomers','pets','latestPetPhotos','officescount','zip','allusers','api_response'));
    }


 public function shelters(){













 }


}
