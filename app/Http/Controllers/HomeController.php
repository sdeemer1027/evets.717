<?php

namespace App\Http\Controllers;

use App\Models\petgroomers;
use App\Models\vetoffices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $petgroomers= petgroomers::where('id','>','0')->get();//->paginate(15);

        $pets= petgroomers::where('id','>','0')->get();

        return view('home', compact('offices','user','petgroomers','pets'));
    }
}
