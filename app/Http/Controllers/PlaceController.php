<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all();
        return view('places.index', compact('places'));
    }

    public function create()
    {
        return view('places.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Place::create([
            'name' => $request->name,
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'image' => $imagePath,
        ]);

        return redirect()->route('places.index')->with('success', 'Tempat wisata berhasil ditambahkan.');
    }

    public function show(Place $place)
    {
        return view('places.show', compact('place'));
    }

    public function edit(Place $place)
    {
        return view('places.edit', compact('place'));
    }

    public function update(Request $request, Place $place)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $place->image;
        if ($request->hasFile('image')) {

            if ($place->image) {
                Storage::disk('public')->delete($place->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $place->update([
            'name' => $request->name,
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'image' => $imagePath,
        ]);

        return redirect()->route('places.index')->with('success', 'Tempat wisata berhasil diperbarui.');
    }

    public function destroy(Place $place)
    {

        if ($place->image) {
            Storage::disk('public')->delete($place->image);
        }
        $place->delete();
        return redirect()->route('places.index')->with('success', 'Tempat wisata berhasil dihapus.');
    }
}