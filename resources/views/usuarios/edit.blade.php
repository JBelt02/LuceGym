<x-app-layout>
    <div class="max-w-4xl mx-auto bg-gray-800 p-8 rounded-lg shadow-lg mt-10 text-white mb-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Editar Usuario</h1>

        <!-- Mostrar errores de validación -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario para editar usuario -->
        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div class="mb-4">
                <label for="nombre" class="block text-lg font-medium">Nombre *</label>
                <input type="text" name="nombre" id="nombre" class="w-full mt-1 p-2 bg-gray-700 text-white rounded border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('nombre', $usuario->nombre) }}" required>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-lg font-medium">Email *</label>
                <input type="email" name="email" id="email" class="w-full mt-1 p-2 bg-gray-700 text-white rounded border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('email', $usuario->email) }}" required>
            </div>

            <!-- Teléfono -->
            <div class="mb-4">
                <label for="telefono" class="block text-lg font-medium">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="w-full mt-1 p-2 bg-gray-700 text-white rounded border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('telefono', $usuario->telefono) }}">
            </div>

            <!-- Dirección -->
            <div class="mb-4">
                <label for="direccion" class="block text-lg font-medium">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="w-full mt-1 p-2 bg-gray-700 text-white rounded border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('direccion', $usuario->direccion) }}">
            </div>

            <!-- Tipo de Usuario -->
            <div class="mb-4">
                <label for="tipo_usuario" class="block text-lg font-medium">Tipo de Usuario *</label>
                <select name="tipo_usuario" id="tipo_usuario" class="w-full mt-1 p-2 bg-gray-700 text-white rounded border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500" required>
                    <option value="cliente" {{ $usuario->tipo_usuario === 'cliente' ? 'selected' : '' }}>Cliente</option>
                    <option value="entrenador" {{ $usuario->tipo_usuario === 'entrenador' ? 'selected' : '' }}>Entrenador</option>
                </select>
            </div>

            <!-- Especialidad (Solo para Entrenadores) -->
            <div id="especialidad_field" class="mb-4" style="{{ $usuario->tipo_usuario === 'entrenador' ? '' : 'display: none;' }}">
                <label for="especialidad" class="block text-lg font-medium">Especialidad</label>
                <input type="text" name="especialidad" id="especialidad" class="w-full mt-1 p-2 bg-gray-700 text-white rounded border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('especialidad', $usuario->especialidad ?? '') }}">
            </div>

            <!-- Botón de Envío -->
            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('usuarios.index') }}" class="text-gray-400 hover:text-gray-200 underline">
                    Volver a la lista de usuarios
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:ring focus:ring-blue-500">
                    Actualizar Usuario
                </button>
            </div>
        </form>
    </div>

    <!-- Script para mostrar/ocultar el campo de especialidad -->
    <script>
        document.getElementById('tipo_usuario').addEventListener('change', function () {
            const especialidadField = document.getElementById('especialidad_field');
            if (this.value === 'entrenador') {
                especialidadField.style.display = 'block';
                document.getElementById('especialidad').value = ''; // Vaciar el campo si es necesario
            } else {
                especialidadField.style.display = 'none';
            }
        });
    </script>
</x-app-layout>
