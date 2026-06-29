<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Trace;
use App\Models\Device;


class OwnerBoardController extends Controller
{



    public function index(Request $request)
    {
        $search = '';
        if (session('viewSection_owner') == null) {
            session()->put('viewSection_owner', 1);
        }
        
        
        if (session('viewSection_owner') == 1){

            $user = auth()->user()->load('devices');
            $data = [
                'user' => $user
            ];
        } 
        elseif (session('viewSection_owner')==2) {
            $user = auth()->user()->load('devices');

            $selectedDevId = $request->input('devId_select', $user->devices->pluck('devId')->last());

            $query = DB::table('devices')->where('devId', $selectedDevId);

            $devices = $query->latest('updatedOn')->paginate(20)->appends($request->all());
            
            $data = [
                'user' => $user,
                'devices' => $devices,
                'selectedDevId' => $selectedDevId
            ];
        }
        elseif (session('viewSection_owner') == 3) {
            $user = auth()->user()->load('devices');
            
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

            // 5. LISTADO PARA LA TABLA
            $traces = $query->latest('updated_at')->paginate(20)->appends($request->all());

            // Pasamos 'selectedDevId' a la vista para que el select se quede marcado
            $data = [
                'user' => $user,
                'stats' => $stats,
                'traces' => $traces,
                'selectedDevId' => $selectedDevId
            ];
        }
        else{
            $data = [
                
            ];
        }

        return view('admin_owner/user_panel', $data);

    }

    public function edit($devId)
    {
        $device = Device::where('devId', $devId)->firstOrFail();
        return view('admin_owner.device_edit', compact('device'));
    }
    
    // Actualizar parámetros técnicos
    public function updateParams(Request $request, $devId) 
    {
        $services = (int) $request->services;
        $initTime = (int) $request->initTime;
        $endTime = (int) $request->endTime;

        // REGLA: (endTime - initTime) > (60 * services)
        $difference = $endTime - $initTime;
        $minRequired = 60 * $services;

        if ($difference <= $minRequired) {
            return back()->withErrors([
                'range' => "La diferencia entre la hora de inicio y fin ($difference) debe ser mayor a $minRequired (60 x $services servicios)."
            ])->withInput();
        }

        // Si pasa la validación, procedemos a guardar
        DB::table('devices')->where('devId', $devId)->update([
            'services' => $services, //str_pad($services, 2, '0', STR_PAD_LEFT),
            'duration' => $request->duration, //str_pad($request->duration, 2, '0', STR_PAD_LEFT),
            'initTime' => $initTime, //str_pad($initTime, 4, '0', STR_PAD_LEFT),
            'endTime'  => $endTime //str_pad($endTime, 4, '0', STR_PAD_LEFT),
        ]);

        return redirect()->route('user_panel')
                 ->with('success', 'Parámetros actualizados con éxito.');
    }
    
}
