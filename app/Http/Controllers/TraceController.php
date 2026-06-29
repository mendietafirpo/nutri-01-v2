<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trace;


class TraceController extends Controller
{


    public function edit($traceId)
    {
        $trace = Trace::where('traceId', $traceId)->firstOrFail();
        return view('admin.trace_edit', compact('trace'));
    }

    public function update(Request $request, $traceId)
    {
        $trace = Trace::where('traceId', $traceId)->firstOrFail();

        $request->validate([
            'devId' => 'required|string|max:4',
            'nsInd' => 'nullable|string|max:1',
            'devLong' => 'nullable|string|max:20',
            'ewInd' => 'nullable|string|max:1',
            'devLat' => 'nullable|string|max:20',
            'serveNum' => 'nullable|integer',
            'serveTime' => 'nullable|numeric',
            'serveVolt' => 'nullable|numeric',
            'serveTemp' => 'nullable|numeric',
            'serveHum' => 'nullable|numeric',
            'servePress' => 'nullable|numeric',
            'signalQual' => 'nullable|string|max:5',
            'modemImei' => 'nullable|string|max:20',
            'simIccid' => 'nullable|string|max:20',
        ]);

        $trace->update($request->all());

        return redirect()->route('traces.edit', $trace->traceId)
                         ->with('success', 'Registro actualizado correctamente.');
    }
    
    public function destroy($traceId)
    {
        trace::findOrFail($traceId)->delete();
        return redirect()->back();
    }

}
