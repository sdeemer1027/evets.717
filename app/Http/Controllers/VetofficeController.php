<?php

namespace App\Http\Controllers;

use App\Models\vetoffices;
use App\Models\zipcodes;
use Illuminate\Http\Request;


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
        //
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

    public function searchByRadius(Request $request)
    {


        $zip = $request->input('zip');
        if($zip){
 //       $offices = vetoffices::where('id', '>', '0')->paginate(15);

}
else{
    $zip ='07840';
}


        $maininfo = zipcodes::select('lat','lng','city','statename')->where('zip','=',$zip)->firstOrFail();
 //       $maininfo2 = zipcodes::select('*')->where('zip','=',$zip)->get();
//        $maininfo = vetoffices::select('*')->where('zip','=',$zip)->get();

//$lat =$maininfo->lat;
//dd($maininfo,$maininfo2,$maininfo->lat); //,$maininfo->lat);

        $latitude = $maininfo->lat; //$request->input('latitude');
        $longitude = $maininfo->lng; //$request->input('longitude');
        $radius = $request->input('radius', 10); // Default radius in kilometers

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
        return view('findvet', compact('locations'));
//        return response()->json($locations);
    }



}
