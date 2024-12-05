<x-app-layout>
    <div class="max-w-4xl mx-auto bg-gray-800 p-8 rounded-lg shadow-lg mt-10 text-white mb-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Crear Nueva Clase</h1>

        <!-- Mensaje de Éxito -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

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

        <!-- Formulario para crear una clase -->
        <form method="POST" action="{{ route('clases.store') }}">
            @csrf

            <!-- Nombre -->
            <div class="mb-4">
                <label for="nombre" class="block text-lg font-medium">Nombre *</label>
                <input type="text" name="nombre" id="nombre" class="w-full mt-1 p-2 bg-gray-700 text-white rounded border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('nombre') }}" required>
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="block text-lg font-medium">Descripción *</label>
                <textarea name="descripcion" id="descripcion" rows="4" class="w-full mt-1 p-2 bg-gray-700 text-white rounded border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500" required>{{ old('descripcion') }}</textarea>
            </div>

            <!-- Duración -->
            <div class="mb-4">
                <label for="duracion" class="block text-lg font-medium">Duración (minutos) *</label>
                <input type="number" name="duracion" id="duracion" class="w-full mt-1 p-2 bg-gray-700 text-white rounded border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('duracion') }}" required>
            </div>

            <!-- Botones -->
            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('clases.index') }}" class="text-gray-400 hover:text-gray-200 underline">
                    Volver a la lista de clases
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:ring focus:ring-blue-500">
                    Crear Clase
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
