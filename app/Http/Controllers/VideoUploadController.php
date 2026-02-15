<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoUploadController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'video' => 'required|mimes:mp4,avi,mov,webm|max:51200', // 50MB máximo
        'video_name' => 'required|string|max:255|regex:/^[a-zA-Z0-9_-]+$/',
    ]);

    $file = $request->file('video');
    $customName = $request->input('video_name'); // Nombre ingresado por el usuario
    $fileName = $customName . '.' . $file->getClientOriginalExtension();


    // Guardar en storage/app/public/videos
    $path = $file->storeAs('videos', $fileName, 'public');

    return back()->with('success', 'Video subido con éxito')->with('video', asset('storage/' . $path));
}

}
