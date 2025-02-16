<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContacMail;


class ContactMailController extends Controller
{

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::to('mendietafirpo@gmail.com')->send(new ContactMail($details));

        return back()->with('success', 'Your message has been sent successfully!');
    }

}
