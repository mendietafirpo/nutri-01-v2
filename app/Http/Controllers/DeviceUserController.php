<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\User;
use Illuminate\Http\Request;

class DeviceUserController extends Controller
{
    // Muestra el formulario
    public function create(Device $device)
    {
        // Obtenemos todos los usuarios para el desplegable
        $users = User::orderBy('lastName')->get();
        
        return view('admin.assign', compact('device', 'users'));
    }

    // Guarda la relación en la tabla device_user
    public function store(Request $request)
    {

        $request->validate([
            // Cambia 'exists:devices,id' por 'exists:devices,devId'
            'device_id' => 'required|exists:devices,devId', 
            'user_id' => 'required|exists:users,id',
        ]);

        $device = Device::findOrFail($request->device_id);

        // attach() inserta el registro en la tabla pivote
        // Usamos syncWithoutDetaching para evitar duplicados si ya estaba asignado
        $device->users()->syncWithoutDetaching([$request->user_id]);

        return redirect()->route('devices.edit', $device); // Asumiendo que tienes esta ruta
                        //  ->with('success', 'Dispositivo asignado correctamente.');
    }


        public function detach($devId, $userId)
        {
            // Buscamos el dispositivo por su clave primaria personalizada (devId)
            $device = Device::where('devId', $devId)->firstOrFail();

            // El método detach elimina la fila en la tabla 'device_user'
            // que coincida con este devId y este userId
            $device->users()->detach($userId);

           return redirect()->route('devices.edit', $devId);
            // ->with('success', 'El dueño ha sido eliminado correctamente.');
        }
}
