<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    // Especificamos que la tabla se llama 'clases'
    protected $table = 'clases';

    // Desactivar timestamps automáticos
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'duracion',
    ];

    // Relación con la tabla Horarios
    public function horarios()
    {
        return $this->hasMany(Horario::class, 'clase_id');
    }
}
