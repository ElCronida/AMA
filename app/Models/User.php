<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const USUARIO_NORMAL = "Normal";
    public const USUARIO_ADMINISTRADOR = "Administrador";

    public const USUARIO_HOMBRE = "Hombre";
    public const USUARIO_MUJER = "Mujer";


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido1',
        'apellido2',
        'fec_nac',
        'peso',
        'altura',
        'direccion',
        'sexo',
        'email',
        'telefono',
        'usuario',
        'password',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function tiposEnArray():array{
        return [
            User::USUARIO_NORMAL => __('Normal'),
            User::USUARIO_ADMINISTRADOR => __('Administrador')
        ];
    }

    public static function sexoEnArray():array{
        return [
            User::USUARIO_HOMBRE => __('Hombre'),
            User::USUARIO_MUJER => __('Mujer')
        ];
    }

    public function gimnasios(){
        return $this->belongsToMany(Gimnasio::class, 'usuarios_gimnasios', 'usuario_id', 'gimnasio_id');
    }
}
