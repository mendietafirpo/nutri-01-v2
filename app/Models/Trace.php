<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trace extends Model
{

    protected $table = 'traces'; // Nombre correcto de la tabla
    protected $primaryKey = 'traceId'; // Especificar la clave primaria real
    public $incrementing = false; // Si no es autoincremental, asegúrate de configurarlo
    protected $keyType = 'string'; // Cambia a 'int' si es un entero
    
    protected $fillable = [
        'traceId',
        'devId',
        'devLong',
        'devLat',	
        'serveNum',	
        'serveTime',
        'serveVolt',
        'serveTemp',
        'serveHum',
        'servePress',
        'signalQual',
        'modemImei',
        'simIccid',
        'created_at',
        'updated_at'
    ];

}
