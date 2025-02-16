<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class DescriptionController extends Controller
{
    public function saveDescriptions(Request $request)
    {
        $data = [
            'videoDescription' => $request->input('videoDescription'),
            'imageDescriptions' => explode(',', $request->input('imageDescriptions')),
        ];

        $jsonData = json_encode($data, JSON_PRETTY_PRINT);
        File::put(storage_path('app/descriptions.json'), $jsonData);

        return redirect()->back()->with('success', 'Descripciones guardadas correctamente.');
    }
}
