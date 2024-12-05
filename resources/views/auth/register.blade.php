<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Nombre -->
        <div>
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <!-- Correo Electrónico -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo Electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Teléfono -->
        <div class="mt-4">
            <x-input-label for="telefono" :value="__('Teléfono')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" autocomplete="telefono" />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        <!-- Dirección -->
        <div class="mt-4">
            <x-input-label for="direccion" :value="__('Dirección')" />
            <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" autocomplete="direccion" />
            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
        </div>

        <!-- Tipo de Usuario -->
        <div class="mt-4">
            <x-input-label for="tipo_usuario" :value="__('Tipo de Usuario')" />
            <select id="tipo_usuario" name="tipo_usuario" class="block mt-1 w-full">
                <option value="cliente" {{ old('tipo_usuario') == 'cliente' ? 'selected' : '' }}>Cliente</option>
                <option value="entrenador" {{ old('tipo_usuario') == 'entrenador' ? 'selected' : '' }}>Entrenador</option>
            </select>
            <x-input-error :messages="$errors->get('tipo_usuario')" class="mt-2" />
        </div>

        <!-- Campo de Especialidad (oculto por defecto) -->
        <div id="especialidad-field" class="mt-4 hidden">
            <x-input-label for="especialidad" :value="__('Especialidad')" />
            <x-text-input id="especialidad" class="block mt-1 w-full" type="text" name="especialidad" :value="old('especialidad')" autocomplete="especialidad" required />
            <x-input-error :messages="$errors->get('especialidad')" class="mt-2" />
        </div>

        <!-- Campo de imagen del entrenador (oculto por defecto) -->
        <div id="imagen-field" class="mt-4 hidden">
            <x-input-label for="imagen_entrenador" :value="__('Imagen del Entrenador')" />
            <input id="imagen_entrenador" class="block mt-1 w-full" type="file" name="imagen_entrenador" accept="image/*" />
            <x-input-error :messages="$errors->get('imagen_entrenador')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrarse') }}
            </x-primary-button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function toggleSpecialidadField() {
                const tipoUsuario = $('#tipo_usuario').val();
                $('#especialidad-field').toggle(tipoUsuario === 'entrenador');
                $('#imagen-field').toggle(tipoUsuario === 'entrenador'); // Mostrar campo de imagen si es entrenador
            }

            $('#tipo_usuario').change(toggleSpecialidadField);
            toggleSpecialidadField(); // Llama a la función al cargar la página
        });
    </script>
</x-guest-layout>
