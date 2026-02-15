<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrixController extends Controller
{
    public function index()
    {

        $descriptions = json_decode(file_get_contents(storage_path('app/designs.json')), true);

        return view('trix', compact('descriptions'));

    }

    public function store(Request $request)
    {
        dd($request->input('content'));
        echo $request->input('content');
     
    }

    public function upload(Request $request)
    {

        if($request->hasFile('file')) {

            dd($request->file('file'));
            exit;
            //get filename with extension
            $filenamewithextension = $request->file('file')->getClientOriginalName();
    
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
    
            //get file extension
            $extension = $request->file('file')->getClientOriginalExtension();
    
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
    
            //Upload File
            $request->file('file')->storeAs('public/uploads', $filenametostore);
    
            // you can save image path below in database
            $path = asset('storage/uploads/'.$filenametostore);
    
            echo $path;
            exit;
        }
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
}

