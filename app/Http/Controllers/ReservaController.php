<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Horario;
use App\Models\User;

class ReservaController extends Controller
{   
    public function index()
    {
        // Obtener todas las reservas
        $reservas = Reserva::with(['cliente', 'horario'])->get();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        // Obtener los horarios disponibles para seleccionar
        $horarios = Horario::all();
        return view('reservas.create', compact('horarios'));
    }
    public function store(Request $request)
        {
            $request->validate([
                'horario_id' => 'required|exists:horarios,id',
                'fecha_reserva' => 'required|date',
            ]);

            // Asignar la reserva al usuario autenticado
            $reserva = new Reserva();
            $reserva->usuario_id = auth()->id();
            $reserva->horario_id = $request->horario_id;
            $reserva->fecha_reserva = $request->fecha_reserva;
            $reserva->save();

            return redirect()->route('horarios.index')->with('success', 'Reserva creada exitosamente.');
        }
    public function edit(Reserva $reserva)
    {
        // Obtener horarios para el desplegable
        $horarios = Horario::all();
        return view('reservas.edit', compact('reserva', 'horarios'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'horario_id' => 'required|exists:horarios,id',
            'fecha_reserva' => 'required|date',
        ]);

        $reserva->update($request->all());

        return redirect()->route('horarios.index')->with('success', 'Reserva actualizada exitosamente.');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('horarios.index')->with('success', 'Reserva eliminada exitosamente.');
    }
}
