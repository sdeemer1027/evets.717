<?php

namespace App\Http\Controllers;

use App\Models\vetoffices;
use Illuminate\Http\Request;

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
        $offices = vetoffices::where('id','>','0')->paginate(15);
        //all()->paginate(15);

        return view('home', compact('offices'));
    }
}
