<?php

namespace App\Http\Controllers;

use App\Models\TouristInfo;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TouristInfoController extends Controller
{
    public function index()
    {
        $touristInfos = TouristInfo::with('place')->get();
        return view('tourist_info.index', compact('touristInfos'));
    }

    public function create()
    {
        $places = Place::all();
        return view('tourist_info.create', compact('places'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'place_id' => 'required|exists:places,id',
            'opening_hours' => 'required',
            'closing_hours' => 'required',
            'informasi' => 'required',
            'image' => 'image|nullable|max:1999',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('images', 'public') : null;

        TouristInfo::create([
            'place_id' => $request->place_id,
            'opening_hours' => $request->opening_hours,
            'closing_hours' => $request->closing_hours,
            'informasi' => $request->informasi,
            'image' => $imagePath,
        ]);

        return redirect()->route('tourist_info.index')->with('success', 'Informasi wisata berhasil ditambahkan.');
    }

    public function show(TouristInfo $touristInfo)
    {
        return view('tourist_info.show', compact('touristInfo'));
    }

    public function edit(TouristInfo $touristInfo)
    {
        $places = Place::all();
        return view('tourist_info.edit', compact('touristInfo', 'places'));
    }

    public function update(Request $request, TouristInfo $touristInfo)
    {
        $request->validate([
            'place_id' => 'required|exists:places,id',
            'opening_hours' => 'required',
            'closing_hours' => 'required',
            'informasi' => 'required',
            'image' => 'image|nullable|max:1999',
        ]);

        if ($request->hasFile('image')) {

            if ($touristInfo->image) {
                Storage::disk('public')->delete($touristInfo->image);
            }

            $touristInfo->image = $request->file('image')->store('images', 'public');
        }

        
        $touristInfo->update([
            'place_id' => $request->place_id,
            'opening_hours' => $request->opening_hours,
            'closing_hours' => $request->closing_hours,
            'informasi' => $request->informasi,
        ]);

        return redirect()->route('tourist_info.index')->with('success', 'Informasi wisata berhasil diperbarui.');
    }

    public function destroy(TouristInfo $touristInfo)
    {
        
        if ($touristInfo->image) {
            Storage::disk('public')->delete($touristInfo->image);
        }
        
        $touristInfo->delete();
        return redirect()->route('tourist_info.index')->with('success', 'Informasi wisata berhasil dihapus.');
    }
}