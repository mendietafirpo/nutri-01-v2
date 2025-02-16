<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function updateColor(Request $request)
    {
        // Valida el color recibido
        $validated = $request->validate([
            'color' => 'required|string|size:7', // Validar que el color sea un string y tenga el formato correcto
        ]);

        // Guarda el color en el almacenamiento (ej. base de datos o archivo)
        Cache::put('bg_color', $validated['color'], now()->addDays(30)); // Guarda el color en cache por 30 días

        // Retorna una respuesta JSON
        return response()->json(['success' => true]);
    }
}
