<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DesignController extends Controller
{
    public function index()
    {
        
        return view('design/design_view');

    }

    public function saveDescriptions(Request $request)
    {
        $data = [
            'videoDescription' => $request->input('videoDescription'),
            'imageDescriptions' => explode(',', $request->input('imageDescriptions')),
        ];

        $jsonData = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        File::put(storage_path('app/designs.json'), $jsonData);

        return redirect()->back()->with('success', 'Descripciones guardadas correctamente.');
    }
}
