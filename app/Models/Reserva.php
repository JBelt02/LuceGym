<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    // Especificamos que la tabla se llama 'reservas'
    protected $table = 'reservas';
    // Desactivar timestamps automáticos
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'usuario_id',
        'horario_id',
        'fecha_reserva',
    ];

    // Relación con el usuario (cliente)
    public function cliente()
    {
        return $this->belongsTo(User::class, 'usuario_id')
                    ->where('tipo_usuario', 'cliente');
    }

    // Relación con el modelo Horario
    public function horario()
    {
        return $this->belongsTo(Horario::class, 'horario_id');
    }
}
