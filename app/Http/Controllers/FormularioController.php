<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Trace;


class FormularioController extends Controller
{
    public function exportNative(Request $request)
    {

        $user = auth()->user()->load('devices');

        $selectedDevId = session('selectedId');

        // 2. INICIAR QUERY DE TRACES
        $query = DB::table('traces')->where('devId', $selectedDevId);

        // 3. FILTROS DE FECHA
        $date_from = session('date_from');
        $date_to = session('date_to');
    
        if ($date_from !=null && $date_to !=null) {
            $from = \Carbon\Carbon::parse($date_from)->startOfDay();
            $to = \Carbon\Carbon::parse($date_to)->endOfDay();
            $query->whereBetween('updated_at', [$from, $to]);
        }


        // 1. Obtener los datos de la base de datos
        $datos = $query->latest('updated_at')->get();//->paginate(20)->appends($request->all());

        // 2. Definir el nombre del archivo
        $filename = "respuestas_formulario_" . date('Y-m-d') . ".csv";

        // 3. Configurar las cabeceras HTTP para que el navegador entienda que es un Excel/CSV
        $headers = [
            "Content-type"        => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        // 4. Definir los títulos de las columnas
        $columnas = ['ID trace', 'ID Dev', 'Latitud', 'nsInd', 'Longitud', 'ewInd', 
                    'serveNum', 'serveTime', 'serveVolt', 'serveTemp','serveHum', 'servePress', 'signalQual', 'updated_at'];
        
        if ($datos->isEmpty()) {
            return back()->with('success', 'No hay datos disponibles para los filtros seleccionados.');
        }
        
        // 5. Crear el archivo temporal en memoria
        $callback = function() use($datos, $columnas) {
            $file = fopen('php://output', 'w');
            
            // Forzar codificación UTF-8 para que Excel muestre bien los acentos y la Ñ
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            // Insertar la fila de títulos
            fputcsv($file, $columnas, ';');

            // Insertar cada registro de la base de datos
            foreach ($datos as $fila) {
                fputcsv($file, [
                    $fila->traceId,
                    $fila->devId,
                    $fila->devLat,
                    $fila->nsInd,
                    $fila->devLong,
                    $fila->ewInd,
                    $fila->serveNum,
                    $fila->serveTime,
                    $fila->serveVolt,
                    $fila->serveTemp,
                    $fila->serveHum,
                    $fila->servePress,
                    $fila->signalQual,
                    // $fila->modemImei,
                    // $fila->simiccid,
                    $fila->updated_at
                ], ';');
            }

            fclose($file);
        };

        // 6. Retornar la respuesta de descarga
        return response()->stream($callback, 200, $headers);
    }
}