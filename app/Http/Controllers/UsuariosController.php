<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Mostrar la lista de todos los usuarios.
     */
    public function index()
    {
        // Obtener todos los usuarios
        $usuarios = User::all();

        // Retornar la vista con la lista de usuarios
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Mostrar el formulario para editar un usuario.
     */
    public function edit($id)
    {
        // Buscar el usuario por su ID
        $usuario = User::findOrFail($id);

        // Retornar la vista para editar al usuario
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Actualizar un usuario específico.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $id,
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'tipo_usuario' => 'required|string|in:entrenador,cliente', // Debe ser 'entrenador' o 'cliente'
            'especialidad' => 'nullable|string|max:255', // Solo será validado si es un entrenador
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',

            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe tener un formato válido.',
            'email.unique' => 'El correo electrónico ya está en uso.',

            'telefono.string' => 'El teléfono debe ser una cadena de texto.',
            'telefono.max' => 'El teléfono no puede tener más de 20 caracteres.',

            'direccion.string' => 'La dirección debe ser una cadena de texto.',
            'direccion.max' => 'La dirección no puede tener más de 255 caracteres.',

            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',

            'tipo_usuario.required' => 'El campo tipo de usuario es obligatorio.',
            'tipo_usuario.in' => 'El tipo de usuario debe ser "entrenador" o "cliente".',

            'especialidad.string' => 'La especialidad debe ser una cadena de texto.',
            'especialidad.max' => 'La especialidad no puede tener más de 255 caracteres.',
        ]);

        // Buscar el usuario por ID
        $usuario = User::findOrFail($id);

        // Actualizar los datos básicos del usuario
        $usuario->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'tipo_usuario' => $request->tipo_usuario,
            // Solo actualizar 'especialidad' si el tipo de usuario es 'entrenador'
            'especialidad' => $request->tipo_usuario === 'entrenador' ? $request->especialidad : null,
        ]);

        // Redirigir a la vista de usuarios con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Eliminar un usuario específico.
     */
    public function destroy($id)
    {
        // Buscar el usuario por su ID
        $usuario = User::findOrFail($id);

        // Eliminar el usuario
        $usuario->delete();

        // Redirigir a la vista de usuarios con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
