<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Especificamos que la tabla se llama 'usuarios', no 'users'
    protected $table = 'usuarios';

     // Desactivar timestamps automáticos
     public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',  // Adaptado a tu tabla, que usa 'nombre' en vez de 'name'
        'email',
        'password',
        'tipo_usuario',  // Incluimos los otros campos de tu tabla si los usarás
        'telefono',
        'direccion',
        'fecha_nacimiento',
        'rol',
        'especialidad',
        'imagen_entrenador'
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relación con el modelo Horario
    public function horarios()
    {
        return $this->hasMany(Horario::class, 'usuario_id');
    }

    // Relación con el modelo Reserva
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'usuario_id');
    }
}
