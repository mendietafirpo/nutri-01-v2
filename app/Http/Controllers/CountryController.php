<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('country')->get();
        return view('admin.countries_edit', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate(['country' => 'required|unique:countries,country|max:255']);
        country::create(['country' => $request->country]);
        return back()->with('success', 'Ciudad agregada.');
    }

    public function update(Request $request, $city_name)
    {
        $request->validate(['country' => 'required|unique:countries,country|max:255']);
        
        // Buscamos por el nombre viejo (que viene en la URL)
        $country = country::where('country', $city_name)->firstOrFail();
        
        // Actualizamos al nombre nuevo
        $country->update(['country' => $request->country]);

        return redirect()->route('countries.index')->with('success', 'Ciudad actualizada.');
    }
}
