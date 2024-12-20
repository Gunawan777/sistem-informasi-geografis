<?php

namespace App\Http\Controllers;

use App\Models\TouristInfo;
use Illuminate\Http\Request;


class InformasiController extends Controller
{
    public function index()
{
    $touristInfo = TouristInfo::all();
    return view('informasi.index', compact('touristInfo'));
}
}