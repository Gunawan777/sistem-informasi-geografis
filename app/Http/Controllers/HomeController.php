<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place; 

class HomeController extends Controller
{
    public function index()
    {
        $places = Place::all(); 

        return view('home.index', compact('places')); 
    }
}
