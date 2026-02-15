<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
      
        // $request->validate([
        //     'image' => 'required|image|mimes:wepb,jpeg,png,jpg,gif|max:2048',
        //     'image_name' => 'required|string|max:255|regex:/^[a-zA-Z0-9_-]+$/',
        // ]);
        
        $file = $request->file;
        $newInput = $request->newInput;
        $fileName = $file->getClientOriginalName();

        // Guardar con el nuevo nombre
        $path = $file->storeAs('uploads', $fileName, 'public');
        $jsonPath = storage_path('app/designs.json');

        $data = file_exists($jsonPath) ? json_decode(file_get_contents($jsonPath), true) : [];
    
        $data['company_description_1'] = $newInput;
      
        file_put_contents($jsonPath, json_encode($data, JSON_PRETTY_PRINT));

        return back()->with('success', 'Imagen subida con éxito')->with('image', asset('storage/' . $path));
    }

    // public function store(Request $request)
    // {
    //     if (!$request->hasFile('file')) {
    //         return response()->json(['error' => 'No file uploaded'], 400);
    //     }

    //     try {
    //         $file = $request->file('file');
    //         $path = $file->store('uploads', 'public');

    //         $url = Storage::url($path);
    //         Log::info("Imagen subida con éxito: " . $url);

    //         return response()->json(['url' => $url], 200);
    //     } catch (\Exception $e) {
    //         Log::error("Error al subir imagen: " . $e->getMessage());
    //         return response()->json(['error' => 'Error interno del servidor'], 500);
    //     }
    // }
    
}
