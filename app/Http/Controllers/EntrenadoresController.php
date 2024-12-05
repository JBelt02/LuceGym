<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EntrenadoresController extends Controller
{
    // Listar todos los entrenadores
    public function index()
    {
        // Obtener solo los usuarios con tipo_usuario 'entrenador'
        $entrenadores = User::where('tipo_usuario', 'entrenador')->get();
        return view('entrenadores.index', compact('entrenadores'));
    }

    // Mostrar formulario para crear un nuevo entrenador
    public function create()
    {
        return view('entrenadores.create');
    }

    // Guardar un nuevo entrenador
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6|confirmed',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'especialidad' => 'required|string|max:255', // Especialidad requerida
            'imagen_entrenador' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede tener más de 100 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            'telefono.max' => 'El teléfono no puede tener más de 20 caracteres.',
            'direccion.max' => 'La dirección no puede tener más de 255 caracteres.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'especialidad.required' => 'La especialidad es obligatoria.',
            'especialidad.max' => 'La especialidad no puede tener más de 255 caracteres.',
            'imagen_entrenador.image' => 'El archivo debe ser una imagen.',
            'imagen_entrenador.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'imagen_entrenador.max' => 'La imagen no debe exceder los 2 MB.',
        ]);

        // Crear el nuevo entrenador
        $entrenador = User::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Encriptar contraseña
            'tipo_usuario' => 'entrenador',
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'rol' => 'u', // Asignar rol 'u'
            'especialidad' => $request->especialidad, // Especialidad requerida
        ]);

        // Si se proporciona una imagen, la guardamos
        if ($request->hasFile('imagen_entrenador')) {
            $imagenPath = $request->file('imagen_entrenador')->store('imagenes_entrenadores', 'public');
            $entrenador->imagen_entrenador = $imagenPath;
            $entrenador->save();
        }

        return redirect()->route('entrenadores.index')->with('success', 'Entrenador creado exitosamente.');
    }

    // Mostrar formulario para editar un entrenador
    public function edit($id)
    {
        // Buscar el entrenador por ID y tipo_usuario 'entrenador'
        $entrenador = User::where('tipo_usuario', 'entrenador')->findOrFail($id);
        return view('entrenadores.edit', compact('entrenador'));
    }

    // Actualizar la información de un entrenador
    public function update(Request $request, $id)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email,' . $id,
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'especialidad' => 'required|string|max:255', // Especialidad requerida
            'imagen_entrenador' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede tener más de 100 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'telefono.max' => 'El teléfono no puede tener más de 20 caracteres.',
            'direccion.max' => 'La dirección no puede tener más de 255 caracteres.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'especialidad.required' => 'La especialidad es obligatoria.',
            'especialidad.max' => 'La especialidad no puede tener más de 255 caracteres.',
            'imagen_entrenador.image' => 'El archivo debe ser una imagen.',
            'imagen_entrenador.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o gif.',
            'imagen_entrenador.max' => 'La imagen no debe exceder los 2 MB.',
        ]);

        // Buscar el entrenador por ID y tipo_usuario 'entrenador'
        $entrenador = User::where('tipo_usuario', 'entrenador')->findOrFail($id);

        // Actualizar los datos del entrenador
        $entrenador->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'rol' => 'u', // Asignar rol 'u'
            'especialidad' => $request->especialidad, // Especialidad requerida
        ]);

        // Si se proporciona una nueva imagen, la guardamos
        if ($request->hasFile('imagen_entrenador')) {
            $imagenPath = $request->file('imagen_entrenador')->store('imagenes_entrenadores', 'public');
            $entrenador->imagen_entrenador = $imagenPath;
            $entrenador->save();
        }

        return redirect()->route('entrenadores.index')->with('success', 'Entrenador actualizado exitosamente.');
    }

    // Eliminar un entrenador
    public function destroy($id)
    {
        // Buscar el entrenador por ID y tipo_usuario 'entrenador'
        $entrenador = User::where('tipo_usuario', 'entrenador')->findOrFail($id);

        // Eliminar el entrenador
        $entrenador->delete();

        return redirect()->route('entrenadores.index')->with('success', 'Entrenador eliminado exitosamente.');
    }
}
