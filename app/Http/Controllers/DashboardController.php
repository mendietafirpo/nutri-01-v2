<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        
        return view('dashboard');

    }
    
    public $viewContent = 0;

    public function viewContent($item)
    {
        $viewContent = $item;

        return view('dashboard', ['viewUser']);

    }
}
