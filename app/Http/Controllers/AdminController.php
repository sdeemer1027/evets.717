<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\vetoffices;
use App\Models\petgroomers;
use App\Models\PetKennel;

use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function dashboard()
    {
        $users = User::all();
        $articles = Article::all();
        $categories = Category::all();
        $vetoffices = ''; //vetoffices::all()->count();
        $petgroomers= ''; //petgroomers::all()->count();

$petkennels = ''; //PetKennel::all()->count();

        // Pass the data to the dashboard view
        return view('admin.dashboard', compact('users', 'articles','categories','vetoffices','petgroomers','petkennels'));
  
    }
}
