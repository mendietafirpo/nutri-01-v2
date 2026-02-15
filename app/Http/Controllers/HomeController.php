<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public $editMode = 'false';


    public function index() {
        // Cargar las descripciones desde el archivo JSON (ejemplo)
        $descriptions = json_decode(file_get_contents(storage_path('app/designs.json')), true);
        $colors = json_decode(file_get_contents(storage_path('app/designs.json')), true);
        if (!session('editMode'))
        {
            session()->put('editMode', 'false');
        }

        return view('welcome', compact('descriptions', 'colors'));

    }

    
    public function updateDesign(Request $request)
        {
            try {
                $filePath = storage_path('app/designs.json');
        
                $key = $request->input('key');
                $value = $request->input('value');
        
                if (!$value || !$key) {
                    return response()->json(['success' => false, 'message' => 'Faltan datos'], 400);
                }
        
                $data = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];
        
                $data[$key] = $value;
        
                file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
    
                return response()->json(['success' => true, 'message' => 'Color guardado correctamente']);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
            }
        }
    
        
    public function getEditMode(Request $request) 
        {

            session()->put('editMode', $request->input('editMode'));

            return redirect()->back();

        }
    
}
