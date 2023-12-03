<?php

namespace App\Http\Controllers;

use App\Models\vetoffices;
use App\Models\zipcodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VetofficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     //   dd($id);

$vetdetails= vetoffices::select()->where('id',$id)->get();

  return view('vetdetails', compact('vetdetails'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchByRadius(Request $request, $zip)
    {
      if($request->input('zip')) {
         $zip = $request->input('zip');
      }
      else{
          $zip =$zip;
      }

        $maininfo = zipcodes::select('lat','lng','city','statename')->where('zip','=',$zip)->firstOrFail();

        $latitude = $maininfo->lat; //$request->input('latitude');
        $longitude = $maininfo->lng; //$request->input('longitude');
        $radius = 10; //$request->input('radius', 10); // Default radius in kilometers

        $locations = vetoffices::selectRaw("
            id,
            name,address,phone,city,state,zip,
            lat,
            lng,
            (6371 * acos(cos(radians($latitude)) * cos(radians(lat)) * cos(radians(lng) - radians($longitude)) + sin(radians($latitude)) * sin(radians(lat))))
            AS distance
        ")
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            //->paginate(15);
            ->get();
//dd($locations);
            $officescount =vetoffices::selectRaw("
            id,name,address,phone,city,state,zip,lat,lng,
            (6371 * acos(cos(radians($latitude)) * cos(radians(lat)) * cos(radians(lng) - radians($longitude)) + sin(radians($latitude)) * sin(radians(lat))))
            AS distance
        ")
            ->having('distance', '<', $radius)
            ->orderBy('distance')->count();
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
        return view('findvet', compact('locations','officescount','user','zip'));
//        return response()->json($locations);
    }



}
