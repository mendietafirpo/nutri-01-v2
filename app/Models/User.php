<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'lastName',
        'firstName',
        'email',
        'role',
        'cellPhone',
        'addrLine1',
        'addrLine2',
        'city',
        'country',
        'zipCode',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isAdmin()
    {
        return $this->role === 1;
    }

    // Le dices a Laravel: "Oye, mi columna de actualización se llama 'updatedOn'"
    const UPDATED_AT = 'updatedOn';
    
    // Si tampoco existe 'created_at' y se llama diferente (ej: 'createdOn'), lo pones aquí:
    const CREATED_AT = 'createdOn';
    
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
        protected function casts(): array
        {
            return [
                'email_verified_at' => 'datetime',
                'password' => 'hashed',
            ];
        }


    public function devices()
    {
        return $this->belongsToMany(Device::class, 'device_user', 'userId', 'devId');
     }
}
