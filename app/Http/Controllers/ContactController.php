<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;

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

    
    public function store(Request $request)
    
    {

            $contact = Contact::create($request->all());

            return redirect()->route('contacts')
            ->with('success','Su mensaje fue enviado correctamente. Gracias '.$request->name.' por contactarnos, pronto responderemos a vuestra demanda');

    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->back();
    }


}
