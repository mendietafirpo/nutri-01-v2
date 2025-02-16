<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Trace;

class AdminBoardController extends Controller
{



    public function index(Request $request)
    {
        $search = '';
        $item = $request->input('item');
       
        
        if (session('viewSection') == 1){
            $users = User::where('name', 'like', '%'.$search.'%')->paginate();
            $data = [
                'viewSection' => $item,
                'users' => $users
            ];
        } 
        elseif (session('viewSection')==2) {
            
            $traces = Trace::where('traceId', '>', 0)->paginate();
            $data = [
                'viewSection' => $item,
                'traces' => $traces
            ];
        }
        else{
            $data = [
                'viewSection' => $item
            ];
        }

        return view('admin/admin_panel', $data);

    }

    

    
}
