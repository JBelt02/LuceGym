<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;

class ClasesController extends Controller
{
    // Listar todas las clases
    public function index()
    {
        // Obtener todas las clases
        $clases = Clase::all();
        return view('clases.index', compact('clases'));
    }

    // Mostrar formulario para crear una nueva clase
    public function create()
    {
        return view('clases.create');
    }

    // Guardar una nueva clase
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'duracion' => 'required|integer|min:1|max:120', 
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'duracion.min' => 'La duración debe ser al menos de 1 minuto.',
            'duracion.max' => 'La duración puede ser maximo de 120 minutos.',
        ]);

        // Crear una nueva clase
        Clase::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'duracion' => $request->duracion,
        ]);

        return redirect()->route('clases.index')->with('success', 'Clase creada exitosamente.');
    }

    // Mostrar formulario para editar una clase
    public function edit($id)
    {
        $clase = Clase::findOrFail($id);
        return view('clases.edit', compact('clase'));
    }

    // Actualizar la información de una clase
    public function update(Request $request, $id)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'duracion' => 'required|integer|min:1|max:120', 
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'duracion.min' => 'La duración debe ser al menos de 1 minuto.',
            'duracion.max' => 'La duración puede ser maximo de 120 minutos.',
        ]);

        // Buscar la clase por ID
        $clase = Clase::findOrFail($id);

        // Actualizar los datos de la clase
        $clase->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'duracion' => $request->duracion,
        ]);

        return redirect()->route('clases.index')->with('success', 'Clase actualizada exitosamente.');
    }

    // Eliminar una clase
    public function destroy($id)
    {
        $clase = Clase::findOrFail($id);
        $clase->delete();

        return redirect()->route('clases.index')->with('success', 'Clase eliminada exitosamente.');
    }
}
