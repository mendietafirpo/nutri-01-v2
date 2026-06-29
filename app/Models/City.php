<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';
    // Si tu llave primaria es 'name' o 'ciudad' (texto)
    protected $primaryKey = 'city'; 

    // Indica que no es un entero autoincremental
    public $incrementing = false;

    // Si la llave no es un número, define el tipo
    protected $keyType = 'string';

    // Importante: permite el llenado masivo
    protected $fillable = ['city'];

    public $timestamps = false;


}
