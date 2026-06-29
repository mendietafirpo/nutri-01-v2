<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    public $timestamps = false;

    // Si tu llave primaria es 'name' o 'ciudad' (texto)
    protected $primaryKey = 'country'; 

    // Indica que no es un entero autoincremental
    public $incrementing = false;

    // Si la llave no es un número, define el tipo
    protected $keyType = 'string';

    protected $fillable = ['country'];

    public function countries()
    {
        return $this->belongsToMany(Firma::class);
    }
}
