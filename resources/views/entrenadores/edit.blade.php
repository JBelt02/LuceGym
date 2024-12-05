<x-app-layout>
    <div class="max-w-4xl mx-auto bg-gray-800 p-8 rounded-lg shadow-lg mt-10 text-white mb-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Editar Entrenador</h1>

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

        <!-- Formulario para editar entrenador -->
        <form action="{{ route('entrenadores.update', $entrenador->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div class="mb-4">
                <label for="nombre" class="block text-lg font-medium text-gray-300">Nombre *</label>
                <input type="text" name="nombre" class="w-full mt-1 p-2 bg-gray-700 text-white rounded border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('nombre', $entrenador->nombre) }}" required>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-lg font-medium text-gray-300">Correo Electrónico *</label>
                <input type="email" name="email" class="w-full mt-1 p-2 bg-gray-700 text-white rounded border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('email', $entrenador->email) }}" required>
            </div>

            <!-- Teléfono -->
            <div class="mb-4">
                <label for="telefono" class="block text-lg font-medium text-gray-300">Teléfono</label>
                <input type="text" name="telefono" class="w-full mt-1 p-2 bg-gray-700 text-white rounded border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('telefono', $entrenador->telefono) }}">
            </div>

            <!-- Dirección -->
            <div class="mb-4">
                <label for="direccion" class="block text-lg font-medium text-gray-300">Dirección</label>
                <input type="text" name="direccion" class="w-full mt-1 p-2 bg-gray-700 text-white rounded border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('direccion', $entrenador->direccion) }}">
            </div>

            <!-- Especialidad -->
            <div class="mb-4">
                <label for="especialidad" class="block text-lg font-medium text-gray-300">Especialidad *</label>
                <input type="text" name="especialidad" class="w-full mt-1 p-2 bg-gray-700 text-white rounded border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('especialidad', $entrenador->especialidad) }}" required>
            </div>

            <!-- Imagen del Entrenador -->
            <div class="mb-6">
                <label for="imagen_entrenador" class="block text-lg font-medium">Imagen del Entrenador</label>
                @if($entrenador->imagen_entrenador)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $entrenador->imagen_entrenador) }}" alt="Imagen del Entrenador" class="max-w-full h-32 rounded border border-gray-600">
                    </div>
                @endif
                <input type="file" name="imagen_entrenador" id="imagen_entrenador" class="block w-full text-gray-400 mt-2 p-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:ring focus:ring-blue-500">
            </div>

            <!-- Botón de Envío -->
            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('entrenadores.index') }}" class="text-gray-400 hover:text-gray-200 underline">
                    Volver a la lista de Entrenadores
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:ring focus:ring-blue-500">
                    Actualizar Entrenador
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
