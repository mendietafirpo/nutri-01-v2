<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Trace;
use App\Models\Device;
use App\Models\City;
use App\Models\Country;
use App\Models\Contact;

class AdminBoardController extends Controller
{



    public function index(Request $request)
    {
        $search = '';
        $item = $request->input('item');
        $conteo = 0;
       
        
        if (session('viewSection') == 2){
            $cities = City::pluck('city');
            $countries = Country::pluck('country');
            $users = User::where('lastName', 'like', '%'.$search.'%')->paginate();
            $data = [
                'viewSection' => $item,
                'users' => $users,
                'cities' => $cities,
                'countries' => $countries,
            ];
        } 
        elseif (session('viewSection')==3) {
            
            $devices = Device::whereNotNull('devId')
                            ->with('users') 
                            ->paginate();

            $data = [
                'viewSection' => $item,
                'devices' => $devices
            ];
        }
        elseif (session('viewSection')==4) {

            $user = auth()->user()->load('devices');
            $devices = Device::all();
            // 1. DETERMINAR QUÉ DISPOSITIVO MOSTRAR
            // Prioridad: 1. El que viene por formulario, 2. El último que tenga el usuario
            $selectedDevId = $request->input('devId_select', $user->devices->pluck('devId')->last());
            session()->put('selectedId', $selectedDevId, );
            session()->put('date_from', $request->date_from);
            session()->put('date_to', $request->date_to);
            
            // 2. INICIAR QUERY DE TRACES
            $query = DB::table('traces')->where('devId', $selectedDevId);

            // 3. FILTROS DE FECHA
            if ($request->filled('date_from') && $request->filled('date_to')) {
                $from = \Carbon\Carbon::parse($request->date_from)->startOfDay();
                $to = \Carbon\Carbon::parse($request->date_to)->endOfDay();
                $query->whereBetween('updated_at', [$from, $to]);
                // dd($query);
                $conteo = (clone $query)->count(); 
                // dd($conteo);
            }

            // 4. PROMEDIOS
            $stats = (clone $query)->select(
                DB::raw('AVG(serveVolt) as avg_volt'),
                DB::raw('MAX(serveTemp) as max_temp'),
                DB::raw('MIN(serveTemp) as min_temp'),
                DB::raw('AVG(serveHum) as avg_hum'),
                DB::raw('MAX(servePress) as max_press')
            )->first();
            
            $traces = $query->latest('updated_at')->paginate(20)->appends($request->all());
            
            $data = [
                // 'user' => $user,
                'devices' => $devices,
                'stats' => $stats,
                'traces' => $traces,
                'selectedDevId' => $selectedDevId,
                'viewSection' => $item,
                'conteo' => $conteo
            ];
        }
        elseif (session('viewSection')==5) {

                $query = DB::table('contacts')
                    ->where(function($subQuery) use ($request) {
                            $subQuery->where('name', 'like', '%'.$request->search.'%')
                                    ->orWhere('city', 'like', '%'.$request->search.'%');
                        });
                if ($request->filled('date_from') && $request->filled('date_to')) {
                    $from = \Carbon\Carbon::parse($request->date_from)->startOfDay();
                    $to = \Carbon\Carbon::parse($request->date_to)->endOfDay();
                    $query->whereBetween('updated_at', [$from, $to]);
                }

                $contacts = $query->latest('updated_at')->paginate(20)->appends($request->all());
                $data = [
                    'viewSection' => $item,
                    'contacts' => $contacts
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
