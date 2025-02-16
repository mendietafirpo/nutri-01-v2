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
            'devId' => 'required|string|max:255',
            'devLong' => 'nullable|numeric',
            'devLat' => 'nullable|numeric',
            'serveNum' => 'nullable|integer',
            'serveTime' => 'nullable|date',
            'serveVolt' => 'nullable|numeric',
            'serveTemp' => 'nullable|numeric',
            'serveHum' => 'nullable|numeric',
            'servePress' => 'nullable|numeric',
            'signalQual' => 'nullable|integer',
            'modemImei' => 'nullable|string|max:255',
            'simIccid' => 'nullable|string|max:255',
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
