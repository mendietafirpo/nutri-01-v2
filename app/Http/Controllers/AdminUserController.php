<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\City;
use App\Models\Country;

class AdminUserController extends Controller
{


    public function edit($id)
    {
        $cities = City::pluck('city');
        $countries = Country::pluck('country');
        $user = User::findOrFail($id);
        return view('admin.users.users_edit', compact('user', 'cities', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->except('password')); // No actualizamos la contraseña desde aquí
        return redirect()->route('admin_panel');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back();
    }

    // Muestra el formulario
    public function create()
    {
        $cities = City::pluck('city');
        $countries = Country::pluck('country');
        return view('admin.users.create', compact(['cities', 'countries']));
    }

    // Procesa el formulario
    public function store(Request $request)
    {
        
        $request->validate([
            'lastName' => ['required', 'string', 'max:255'],
            'firstName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required', 'string'],
            'cellPhone' => ['nullable', 'string', 'max:20'],
            'addrLine1' => ['nullable', 'string', 'max:255'],
            'addrLine2' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:100'],
            'country' => ['nullable', 'string', 'max:100'],
            'zipCode' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        // Guardamos en la base de datos usando tu $fillable
        User::create([
            'lastName' => $request->lastName,
            'firstName' => $request->firstName,
            'email' => $request->email,
            'role' => $request->role,
            'cellPhone' => $request->cellPhone,
            'addrLine1' => $request->addrLine1,
            'addrLine2' => $request->addrLine2,
            'city' => $request->city,
            'country' => $request->country,
            'zipCode' => $request->zipCode,
            'password' => Hash::make($request->password), // Encriptamos la clave
        ]);

        // Redirigimos de vuelta. Al NO usar Auth::login(), tú sigues logeado como Admin.
        return redirect()->route('admin_panel')
            ->with('status', '¡Usuario creado exitosamente por el administrador!');
    }
}