<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Clase;
use App\Models\User;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        // Obtener todos los horarios con la relación usuario y clase
        $horarios = Horario::with(['usuario', 'clase'])->get();

        // Retornar la vista 'horarios.index' con los datos
        return view('horarios.index', compact('horarios'));
    }

    public function create()
    {
        // Obtener clases y entrenadores para los select
        $clases = Clase::all();
        $entrenadores = User::where('tipo_usuario', 'entrenador')->get();

        // Retornar la vista 'horarios.create' con los datos necesarios
        return view('horarios.create', compact('clases', 'entrenadores'));
    }

    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'usuario_id' => 'required',
            'fecha' => 'required|date|after_or_equal:today',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'clase_id' => 'required',
        ], [
            'usuario_id.required' => 'El entrenador es obligatorio.',
            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'La fecha debe ser válida.',
            'fecha.after_or_equal' => 'La fecha debe ser igual o mayor a hoy.',
            'hora_inicio.required' => 'La hora de inicio es obligatoria.',
            'hora_inicio.date_format' => 'La hora de inicio debe tener el formato HH:MM.',
            'hora_fin.required' => 'La hora de fin es obligatoria.',
            'hora_fin.date_format' => 'La hora de fin debe tener el formato HH:MM.',
            'hora_fin.after' => 'La hora de fin debe ser mayor que la hora de inicio.',
            'clase_id.required' => 'La clase es obligatoria.',
        ]);

        // Guardar el horario
        Horario::create($request->all());

        return redirect()->route('horarios.index')->with('success', 'Horario creado exitosamente.');
    }

    public function edit(Horario $horario)
    {
        // Obtener clases y entrenadores para los select
        $clases = Clase::all();
        $entrenadores = User::where('tipo_usuario', 'entrenador')->get();

        // Retornar la vista 'horarios.edit' con los datos necesarios
        return view('horarios.edit', compact('horario', 'clases', 'entrenadores'));
    }

    public function update(Request $request, Horario $horario)
    {
        // Validar los datos
        $request->validate([
            'usuario_id' => 'required',
            'fecha' => 'required|date|after_or_equal:today',
            'hora_inicio' => 'required|',
            'hora_fin' => 'required|after:hora_inicio',
            'clase_id' => 'required',
        ], [
            'usuario_id.required' => 'El entrenador es obligatorio.',
            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'La fecha debe ser válida.',
            'fecha.after_or_equal' => 'La fecha debe ser igual o mayor a hoy.',
            'hora_inicio.required' => 'La hora de inicio es obligatoria.',
            'hora_fin.required' => 'La hora de fin es obligatoria.',
            'hora_fin.after' => 'La hora de fin debe ser mayor que la hora de inicio.',
            'clase_id.required' => 'La clase es obligatoria.',
        ]);

        // Actualizar el horario
        $horario->update($request->all());

        return redirect()->route('horarios.index')->with('success', 'Horario actualizado exitosamente.');
    }

    public function destroy(Horario $horario)
    {
        // Eliminar el horario
        $horario->delete();

        return redirect()->route('horarios.index')->with('success', 'Horario eliminado exitosamente.');
    }
}
