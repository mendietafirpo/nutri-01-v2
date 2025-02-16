<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ShowController extends Controller


{

    
    public function index()
    {
        $user = 'Juan';

        return view('show', compact('user'));

    }
}
