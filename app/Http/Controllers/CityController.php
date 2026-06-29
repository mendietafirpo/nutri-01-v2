<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('city')->get();
        return view('admin.cities_edit', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate(['city' => 'required|unique:cities,city|max:255']);
        City::create(['city' => $request->city]);
        return back()->with('success', 'Ciudad agregada.');
    }

    public function update(Request $request, $city_name)
    {
        $request->validate(['city' => 'required|unique:cities,city|max:255']);
        
        // Buscamos por el nombre viejo (que viene en la URL)
        $city = City::where('city', $city_name)->firstOrFail();
        
        // Actualizamos al nombre nuevo
        $city->update(['city' => $request->city]);

        return redirect()->route('cities.index')->with('success', 'Ciudad actualizada.');
    }
}