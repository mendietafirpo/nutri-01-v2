<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendContactForm(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];


        Mail::send('contact', $details, function ($message) use ($request) {
            $message->to('mendietafirpo@gmail.com')
                    ->subject('Nuevo mensaje de contacto')
                    ->from($request->email, $request->name);
        });


        return back()->with('success', '¡Tu mensaje ha sido enviado!');
    }


    public function index()
    {
        
        return view('contacts');

    }
}
