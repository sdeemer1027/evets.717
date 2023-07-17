<?php

namespace App\Http\Controllers;

use App\Models\OfficeLocation;
use Illuminate\Http\Request;

class OfficeLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officeLocations = OfficeLocation::all();

 //       AIzaSyB-lHl7hrYvREMt2fduparoe7xfYuhQbbM


// Include the Simple HTML DOM Parser library
        require 'simple_html_dom.php';

// The search query
        $query = 'OpenAI';

// Create the Google search URL
        $searchUrl = 'https://www.google.com/search?q=' . urlencode($query);

// Send a GET request to fetch the search results page
        $html = file_get_html($searchUrl);

// Find all search result elements
        $searchResults = $html->find('div[class="g"]');

// Loop through each search result and extract the desired information
        foreach ($searchResults as $result) {
            // Extract the title
            $titleElement = $result->find('h3');
            $title = $titleElement[0]->plaintext;

            // Extract the URL
            $urlElement = $result->find('a');
            $url = $urlElement[0]->href;

            // Print the title and URL
            echo "Title: $title\n";
            echo "URL: $url\n\n";
        }


        return view('office_locations.index', compact('officeLocations'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('office_locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
        ]);

        OfficeLocation::create($validatedData);

        return redirect()->route('office-locations.index')->with('success', 'Office location created successfully.');
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
}
