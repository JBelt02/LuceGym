<x-app-layout>
    <div class="max-w-4xl mx-auto bg-gray-800 p-8 rounded-lg shadow-lg mt-10 text-white mb-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Editar Horario</h1>

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

        <!-- Formulario para editar horario -->
        <form action="{{ route('horarios.update', $horario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Clase -->
            <div class="mb-4">
                <label for="clase_id" class="block text-lg font-medium">Clase *</label>
                <select name="clase_id" id="clase_id" class="w-full mt-1 p-2 bg-gray-700 text-white rounded border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500" required>
                    @foreach($clases as $clase)
                        <option value="{{ $clase->id }}" {{ $horario->clase_id == $clase->id ? 'selected' : '' }}>
                            {{ $clase->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Entrenador -->
            <div class="mb-4">
                <label for="usuario_id" class="block text-lg font-medium">Entrenador *</label>
                <select name="usuario_id" id="usuario_id" class="w-full mt-1 p-2 bg-gray-700 text-white rounded border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500" required>
                    @foreach($entrenadores as $entrenador)
                        <option value="{{ $entrenador->id }}" {{ $horario->usuario_id == $entrenador->id ? 'selected' : '' }}>
                            {{ $entrenador->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Fecha -->
            <div class="mb-4">
                <label for="fecha" class="block text-lg font-medium">Fecha *</label>
                <input type="date" name="fecha" id="fecha" value="{{ $horario->fecha }}" class="w-full mt-1 p-2 bg-gray-700 text-white rounded border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500" required>
            </div>

            <!-- Hora de Inicio -->
            <div class="mb-4">
                <label for="hora_inicio" class="block text-lg font-medium">Hora de Inicio *</label>
                <input type="time" name="hora_inicio" id="hora_inicio" value="{{ $horario->hora_inicio }}" class="w-full mt-1 p-2 bg-gray-700 text-white rounded border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500" required>
            </div>

            <!-- Hora de Fin -->
            <div class="mb-4">
                <label for="hora_fin" class="block text-lg font-medium">Hora de Fin *</label>
                <input type="time" name="hora_fin" id="hora_fin" value="{{ $horario->hora_fin }}" class="w-full mt-1 p-2 bg-gray-700 text-white rounded border border-gray-600 focus:outline-none focus:ring focus:ring-blue-500" required>
            </div>

            <!-- Botón de Envío -->
            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('horarios.index') }}" class="text-gray-400 hover:text-gray-200 underline">
                    Volver a la lista de Horarios
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:ring focus:ring-blue-500">
                    Actualizar Horario
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
