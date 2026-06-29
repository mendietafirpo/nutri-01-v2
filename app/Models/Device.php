<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $table = 'devices';

    public $timestamps = false;

// 1. Dile a Laravel que el "DNI" de la tabla no es 'id' sino 'devId'
    protected $primaryKey = 'devId';

    // 2. Si tu devId no es un número autoincremental (por ejemplo, es un código BC98)
    public $incrementing = false;

    // 3. Si es un texto/string
    protected $keyType = 'string';

    protected $fillable = [
        'devId',
        'email',
        'services',
        'duration',
        'initTime',
        'endTime',
        'gmtTime',
        'updatedOn'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'device_user', 'devId', 'userId');
    }
}

