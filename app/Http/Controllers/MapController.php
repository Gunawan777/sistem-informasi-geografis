<?php

namespace App\Http\Controllers;
use App\Models\Place; 

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $places = Place::all(); 
        return view('map.index', compact('places'));
    }
}
