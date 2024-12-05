<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    // Especificamos que la tabla se llama 'horarios'
    protected $table = 'horarios';
    // Desactivar timestamps automáticos
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'clase_id',
        'usuario_id',
        'fecha',
        'hora_inicio',
        'hora_fin',
    ];

    // Relación con el modelo Clase
    public function clase()
    {
        return $this->belongsTo(Clase::class, 'clase_id');
    }

    // Relación con el usuario (entrenador)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Relación con la tabla Reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'horario_id');
    }
}
