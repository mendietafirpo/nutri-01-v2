<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;

class ContactController extends Controller
{
    public function sendContactForm(Request $request)
    {
        // 1. FILTRO ANTI-SPAM (Honeypot): Si el campo trampa viene con texto, es un bot
        if (!empty($request->filled('website_url')) || $request->input('website_url') !== null) {
            // Simulamos un éxito falso para engañar al bot y que crea que funcionó
            return back()->with('success', '¡Tu mensaje ha sido enviado con éxito!');
        }

        // 2. Validación estándar de los campos reales
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cellPhone' => 'nullable|string|max:50',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'message' => 'required|string|min:5',
        ]);

        // 3. Guardar en la base de datos
        Contact::create($validatedData);

        // 4. Preparar datos y enviar correo (con el replyTo que configuramos antes)
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'cellPhone' => $request->cellPhone ?? 'No especificado',
            'city' => $request->city ?? 'No especificada',
            'country' => $request->country ?? 'No especificado',
            'message' => $request->message,
        ];

        $destinatario = env('MAIL_FROM_ADDRESS', 'mendietafirpo@gmail.com');
        
        try {
            Mail::send('emails.contact', ['details' => $details], function ($message) use ($request, $destinatario) {
                $message->to($destinatario)
                        ->from(env('MAIL_FROM_ADDRESS', 'contacto@nutritronix.com'), 'Nutritronix Web') // <--- ¡AQUÍ ESTÁ LA CLAVE!
                        ->subject('Nuevo mensaje de contacto: ' . $request->name)
                        ->replyTo($request->email, $request->name);
            });
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return back()->with('success','Su mensaje fue enviado correctamente. Gracias '.$request->name.' por contactarnos, pronto responderemos a vuestra demanda');
    }


    public function index()
    {
        
        return view('contacto');

    }

    
    public function store(Request $request)
    
    {

            $contact = Contact::create($request->all());

            return redirect()->route('contacto')
            ->with('success','Su mensaje fue enviado correctamente. Gracias '.$request->name.' por contactarnos, pronto responderemos a vuestra demanda');

    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->back();
    }


}
