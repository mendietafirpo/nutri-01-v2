<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index() {
        // Cargar las descripciones desde el archivo JSON (ejemplo)
        $descriptions = json_decode(file_get_contents(storage_path('app/designs.json')), true);
        $colors = json_decode(file_get_contents(storage_path('app/designs_color.json')), true);
   
        return view('welcome', compact('descriptions', 'colors'));
    }

    
    public function updateDesign(Request $request)
        {
            try {
                $filePath = storage_path('app/designs_color.json');
        
                $color = $request->input('color');
                $key = $request->input('key');
        
                if (!$color || !$key) {
                    return response()->json(['success' => false, 'message' => 'Faltan datos'], 400);
                }
        
                $data = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];
        
                $data[$key] = $color;
        
                file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
    
                return response()->json(['success' => true, 'message' => 'Color guardado correctamente']);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
            }
        }
        
    
}
