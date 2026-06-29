<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DevicesController extends Controller
{
    public function edit($devId)
    {
        $device = Device::where('devId', $devId)->firstOrFail();
        return view('admin.device_edit', compact('device'));
    }


    public function update(Request $request, $devId)
    {
        
        $device = Device::where('devId', $devId)->firstOrFail();


        $device->update($request->all());

        return redirect()->back()
                        ->with('success', 'Registro actualizado correctamente.');
    }
    
    public function destroy($devId)
    {
        Device::findOrFail($devId)->delete();
        return redirect()->back();
    }

    public function store(Request $request)
    
    {

            $devices = Device::create($request->all());
            $devices->save();


            return redirect()->route('admin_panel')
            ->with('success','Se agregó la firma correctamente.');

    }

        public function create()
    {
        return view('admin.device_create');
    }



}

