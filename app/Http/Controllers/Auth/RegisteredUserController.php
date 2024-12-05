<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validación de los campos
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'telefono' => ['nullable', 'string', 'max:20'],
            'direccion' => ['nullable', 'string', 'max:255'],
            'tipo_usuario' => ['required', 'in:cliente,entrenador'], // Validación del tipo de usuario
            'especialidad' => ['nullable', 'string', 'max:255', 'required_if:tipo_usuario,entrenador'], // Requerido si es entrenador
            'rol' => ['nullable', 'in:u,admin'], // Validación del rol
            'imagen_entrenador' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Validación de la imagen
        ]);

        // Si no se proporciona el rol, asignamos 'u' por defecto
        $rol = $request->rol ?? 'u';

        // Creación del usuario con los nuevos campos
        $usuario = User::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'tipo_usuario' => $request->tipo_usuario,
            'especialidad' => $request->tipo_usuario === 'entrenador' ? $request->especialidad : null, // Solo si es entrenador
            'rol' => $rol,
        ]);

        // Si es entrenador y se proporciona una imagen, la guardamos
        if ($request->tipo_usuario === 'entrenador' && $request->hasFile('imagen_entrenador')) {
            $imagenPath = $request->file('imagen_entrenador')->store('imagenes_entrenadores', 'public');
            $usuario->imagen_entrenador = $imagenPath;
            $usuario->save();
        }

        event(new Registered($usuario));

        Auth::login($usuario);

        return redirect(route('dashboard'));
    }
}
